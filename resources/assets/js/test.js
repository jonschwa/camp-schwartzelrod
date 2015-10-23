var vivus = require('vivus');

new vivus('my-div', {duration: 200, file: 'test.svg'}, function() {
  window.alert('hi');
});