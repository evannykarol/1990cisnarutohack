function config($translateProvider,$translatePartialLoaderProvider ) {
    $translateProvider.useStaticFilesLoader({
      prefix: '/js/languages/translate/',
      suffix: '.json'
    });
    $translateProvider.preferredLanguage('es');
}
angular
    .module('inspinia')
    .config(config)
