const staticCacheName = "site-static-v0";
const dynamicCache = "dynamicCache-v0";
const assets = [
  "/",
  "sw.js",
  "resources/css/style.css",
  "resources/css/queries.css",
  "resources/js/jquery (2).js",
  "resources/js/jquery.js",
  "resources/js/app.js",
  "vendor/materialize/css/materialize.min.css",
  "vendor/materialize/css/materialize.css",
  "vendor/fonts/helvetica/stylesheet.css",
  "vendor/slick/css/slick-theme.css",
  "vendor/slick/css/slick.css",
  "vendor/slick/js/slick.js",
  "vendor/slick/js/slick.min.js",
  "manifest.json",
  "vendor/materialize/js/materialize.min.js",
  "vendor/materialize/js/materialize.js",
  "https://fonts.googleapis.com/icon?family=Material+Icons",
  "https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js",
  "https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js",
  "fallback.php",
  "includes/classes/Main.php",
  "includes/classes/User.php",
  "includes/ajax_handlers/alugar_handler.php",
  "includes/ajax_handlers/login_handler.php",
  "includes/ajax_handlers/register_handler.php",
  "includes/ajax_handlers/boladas_handler.php",
  "includes/ajax_handlers/check_phone.php",
  "includes/ajax_handlers/desapego_handler.php",
  "includes/ajax_handlers/loadRapidas_handler.php",
  "includes/ajax_handlers/loadRapidasMore.php",
  "includes/ajax_handlers/savePostRapidas.php",
  "includes/ajax_handlers/rapidas_handler.php",
  "includes/config/config.php",
  "resources/img/bg/loginbg.svg",
  "resources/img/bg/loginbg1.svg",
  "resources/img/bg/signup.svg",
  "resources/img/bg/signupbg.svg",
  "resources/img/icons/check.svg",
  "resources/img/icons/facebook.svg",
  "resources/img/icons/instagram.svg",
  "resources/img/icons/linkedin.svg",
  "resources/img/icons/logout.svg",
  "resources/img/icons/spinner.svg",
  "resources/img/icons/telegram.svg",
  'resources/img/icons/twitterx.svg',
  "resources/img/icons/verified-white.svg",
  "resources/img/icons/verified.svg",
  "resources/img/icons/whatsapp.svg",
  "resources/img/info/ads.svg",
  "resources/img/info/banner.svg",
  "resources/img/info/erro_post.svg",
  "resources/img/info/search.svg",
  "resources/img/logos/logo-01.svg",
  "resources/img/logos/logo-02.svg",
  "resources/img/logos/logo-03.svg",
  "resources/img/logos/logo-04.svg",
  "resources/img/logos/logo-05.svg",
  "resources/img/logos/logo-06.svg",
  "resources/img/logos/logo-main-02.svg",
  "resources/img/logos/logo-white.svg",
  "resources/img/logos/logo.svg",
  "footer.php",
  "header.php",
  "login.php",
  "register.php",
  "wellcome.php",
];

/* const limitCache = (name, size) => {
  caches.open(name).then((cache) => {
    cache.keys().then((keys) => {
      if (keys.length > size) {
        cache.delete(keys[0]).then(limitCache(name, size));
      }
    });
  });
}; */

const limitCache = async (name, size) => {
  const cache = await caches.open(name);
  const keys = await cache.keys();

  if (keys.length > size) {
    await cache.delete(keys[0]);
    await limitCache(name, size);
  }
};

// install service worker
self.addEventListener("install", (evt) => {
  console.log('Installed');

  evt.waitUntil(
    caches.open(staticCacheName).then((cache) => {
      console.log("Caching");

      // Use try-catch to handle potential errors with cache.addAll
      return cache.addAll(assets)
        .then(() => console.log("Caching successful"))
        .catch((error) => {
          console.error("Caching failed:", error);
          // Optionally, you may want to throw the error to reject the install event
          // throw error;
        });
    })
  );
});

// activate service worker - listening for activate event
self.addEventListener("activate", (evt) => {
  console.log('Active');
  evt.waitUntil(
    caches.keys().then((keys) => {
      console.log(keys);
      return Promise.all(
        keys
          .filter((key) => key !== staticCacheName && key !== dynamicCache)
          .map((key) => caches.delete(key))
      );
    })
  );
});

self.addEventListener("fetch", (evt) => {
  evt.respondWith(
    caches
      .match(evt.request)
      .then((cachesRes) => {
        return (
          cachesRes ||
          fetch(evt.request).then(async (fetchRes) => {
            // Ensure the response is valid before caching
            if (!fetchRes || fetchRes.status !== 200 || fetchRes.type !== "basic") {
              return fetchRes;
            }

            const cache = await caches.open(dynamicCache);
            cache.put(evt.request.url, fetchRes.clone());
            limitCache(dynamicCache, 3);
            return fetchRes;
          })
        );
      })
      .catch((error) => {
        console.error('Fetch error:', error);

        if (evt.request.url.indexOf(".php") > -1) {
          return caches.match("index.php");
        }
      })
  );
});

//fetch event handler
/* self.addEventListener("fetch", (evt) => {
  console.log("fetch", evt);
  evt.respondWith(
    caches
      .match(evt.request)
      .then((cachesRes) => {
        return (
          cachesRes ||
          fetch(evt.request).then(async (fetchRes) => {
            const cache = await caches.open(dynamicCache);
            cache.put(evt.request.url, fetchRes.clone());
            limitCache(dynamicCache, 30);
            return fetchRes;
          })
        );
      })
      .catch(() => {
        if (evt.request.url.indexOf(".php") > -1) {
          return caches.match("fallback.php");
        }
      })
  );
});
 */