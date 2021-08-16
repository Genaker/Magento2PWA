// This is the "Offline page" service worker

importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.0.0/workbox-sw.js');

const CACHE = "pwabuilder-page";

// TODO: replace the following with the correct offline fallback page i.e.: const offlineFallbackPage = "offline.html";
const offlineFallbackPage = "/offline";


self.addEventListener('push', function (event) {

    console.log('[Service Worker] Push Received.');
    console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);
    let text = event.data.text();
    const options = {
        body: text,
        icon: 'images/icon.png',
        badge: 'images/badge.png'
    };

    event.waitUntil(self.registration.showNotification("test push notification", options));

});


self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting();
    }
});

self.addEventListener('install', async (event) => {
    event.waitUntil(
        caches.open(CACHE)
            .then((cache) => cache.add(offlineFallbackPage))
    );
});

if (workbox.navigationPreload.isSupported()) {
    workbox.navigationPreload.enable();
}

self.addEventListener('fetch', (event) => {
    if (event.request.mode === 'navigate') {
        event.respondWith((async () => {

            try {
                var preloadResp = await event.preloadResponse;

                var cache = await caches.open(CACHE);

                if (preloadResp) {
                    cache.put(event.request.url, preloadResp.clone());
                    return preloadResp;
                }

                const networkResp = await fetch(event.request);
                cache.put(event.request.url, networkResp.clone());
                return networkResp;
            } catch (error) {

                var cache = await caches.open(CACHE);

                var cachedResp = await cache.match(event.request.url);
                // cachedResp = undefined if not in cache
                if (cachedResp) return cachedResp;
                cachedResp = await cache.match(offlineFallbackPage);
                if (cachedResp) return cachedResp;
                throw error; //rethrow previous errors if not in cache
            }
        })());
    } else if (event.request.method === 'GET') {

        const regex = /\/static\/version.*\/frontend|\/media\//gm;
        let m;

        m = regex.exec(event.request.url);

        if (m !== null)

            // The result can be accessed through the `m`-variable.
            m.forEach((match, groupIndex) => {
                console.log(`Found match, group ${groupIndex}: ${match}`);
            });

        if (m !== null)

            event.respondWith((async () => {

                var cache = await caches.open(CACHE);

                var preloadResp = await event.preloadResponse;

                if (preloadResp) {
                    cache.put(event.request.url, preloadResp.clone());
                    return preloadResp;
                }

                let fromCache = await cache.match(event.request.url)
                //console.log('[Service Worker] Fetching resource: ' + event.request.url);

                if (fromCache) {
                   // console.log('[Service Worker] From The cache: ' + event.request.url);
                    return fromCache;
                }

                try {
                    let fromInternet = await fetch(event.request);

                    //console.log('[Service Worker] Caching new resource: ' + event.request.url);

                    cache.put(event.request.url, fromInternet.clone());

                    return fromInternet;
                } catch (error) {
                    console.log('No Internet');
                    return new Response('<h1>No Internet</h1>', {
                        headers: {
                            'Content-type': 'text/html',
                        }
                    });
                }

            })());

    }
});
