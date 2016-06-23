(function(home) {
  document.addEventListener('DOMContentLoaded', function() {
    ng.platformBrowserDynamic.bootstrap(home.AppComponent);
  });
})(window.home || (window.home = {}));