if ('serviceWorker' in navigator)
{
    navigator.serviceWorker.register('sw.js')
    .then((reg) => console.log('Service Worker registered', reg))
    .catch((err) => console.log('Service Worker not registered', err))
}

let deferredPrompt; // Allows to show the install prompt
const installButton = document.getElementById("install_button");
const installButton2 = document.getElementById("install_button2");
//installButton.classList.add('install_btn');


window.addEventListener("beforeinstallprompt", e => {
  console.log("beforeinstallprompt fired");
  // Prevent Chrome 76 and earlier from automatically showing a prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  // Show the install button
  installButton.hidden = false;
  installButton2.hidden = false;

  installButton.classList.add('install_btn');
  installButton2.classList.add('install_btn2');

  installButton.addEventListener("click", installApp);
  installButton2.addEventListener("click", installApp2);
});

function installApp() {
    // Show the prompt
    deferredPrompt.prompt();
    installButton.disabled = true;
    //installButton2.disabled = true;
  
    // Wait for the user to respond to the prompt
    deferredPrompt.userChoice.then(choiceResult => {
      if (choiceResult.outcome === "accepted") {
        console.log("PWA setup accepted");
        installButton.classList.remove('install_btn');
        installButton.hidden = true;

      } else {
        console.log("PWA setup rejected");
      }
      installButton.disabled = false;
      deferredPrompt = null;
    });
  }


  function installApp2() {
    // Show the prompt
    deferredPrompt.prompt();
    installButton2.disabled = true;
  
    // Wait for the user to respond to the prompt
    deferredPrompt.userChoice.then(choiceResult => {
      if (choiceResult.outcome === "accepted") {
        console.log("PWA setup accepted");
        installButton2.classList.remove('install_btn2');
        installButton2.hidden = true;

      } else {
        console.log("PWA setup rejected");
      }
      installButton2.disabled = false;
      deferredPrompt = null;
    });
  }

  window.addEventListener("appinstalled", evt => {
    console.log("appinstalled fired", evt);

  });
