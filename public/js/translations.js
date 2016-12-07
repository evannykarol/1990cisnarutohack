function config($translateProvider) {
    $translateProvider.useStaticFilesLoader({
      prefix: '/js/languages/',
      suffix: '.json'
    });
    // $translateProvider.useLocalStorage();
    $translateProvider.preferredLanguage('en');


}
angular
    .module('inspinia')
    .config(config)
