function config($translateProvider) {
    $translateProvider.useStaticFilesLoader({
      prefix: '/js/languages/',
      suffix: '.json'
    });
    // $translateProvider.useLocalStorage();
    // $translateProvider.preferredLanguage('es');


}
angular
    .module('inspinia')
    .config(config)
