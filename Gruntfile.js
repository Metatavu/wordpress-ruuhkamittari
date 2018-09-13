
module.exports = function(grunt) {
  require("load-grunt-tasks")(grunt);

  grunt.initConfig({
    "babel": {
      options: {
        sourceMap: true,
        minified: true
      },
      dist: {
        files: [{
          expand: true,
          cwd: "emergency-congestion-status/js",
          src: ["*.js"],
          dest: "emergency-congestion-status/js/bundle/",
          ext: ".min.js"
        }]
      }
    },
    "sass": {
      dist: {
        options: {
          style: "compressed"
        },
        files: [{
          expand: true,
          cwd: "emergency-congestion-status/styles",
          src: ["*.scss"],
          dest: "emergency-congestion-status/styles/css",
          ext: ".min.css"
        }]
      }
    },
  });
  
  grunt.registerTask("default", ["babel", "sass"]);
};