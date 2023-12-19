// service-worker.js
self.addEventListener('install', (event) => {
    event.waitUntil(
      caches.open('mi-app-cache').then((cache) => {
        return cache.addAll([
          '/',
          // Agrega todos los recursos que desees almacenar en caché
        ]);
      })
    );
  });

  self.addEventListener('fetch', (event) => {
    event.respondWith(
      caches.match(event.request).then((response) => {
        return response || fetch(event.request);
      })
    );
  });
