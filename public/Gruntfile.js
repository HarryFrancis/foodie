// The wrapper
module.exports = function(grunt) {

  // Project configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Task configuration

      // browserSync: {
      //   local: {
      //     bsFiles: {
      //       src: [
      //         "*.php",
      //         "*.css",
      //         "assets/css/*.css",
      //         "assets/scss/**/*.scss",
      //         "assets/js/**/*.js"
      //       ]
      //     },
      //     options: {
      //       proxy: 'base.dev',
      //       watchTask: true,
      //       notify: false,
      //       open: true,
      //       logLevel: 'silent',
      //       ghostMode: {
      //           clicks: true,
      //           scroll: true,
      //           links: true,
      //           forms: true
      //       }
      //     }
      //   }
      // },

      sass: {                              // Task
        local: {                            // Target
          options: {                       // Target options
            style: 'compressed'
          },
          files: {                         // Dictionary of files
            'assets/css/main.css': 'assets/scss/main.scss',       // 'destination': 'source'
            'assets/css/normalize.css': 'assets/scss/normalize.scss',
            'assets/css/vendor.css': 'assets/scss/vendor/*.scss'
          }
        }
      },

      uglify: {
        local: {
          files: {
            'assets/js/min/jquery.1.11.2.min.js': 'assets/js/jquery.1.11.2.js',
            'assets/js/min/main.min.js': 'assets/js/main.js',
            'assets/js/min/vendor.min.js': 'assets/js/vendor/*.js',
            'assets/js/min/modernizr.min.js': 'assets/js/modernizr.js',
            'assets/js/min/respond.min.js': 'assets/js/respond.js'
          }
        }
      },

      watch: {
        options: {
            atBegin: true,
            livereload: true
        },
        sass: {
          files: 'assets/scss/**/*.scss',
          tasks: ['sass:local'],
        },
        js: {
          expand: true,
          files: ['assets/js/**/*.js', '!assets/js/min/**/*'],
          tasks: ['uglify:local'],
        },
      }

  });

  // Load plugin(s)
  require('load-grunt-tasks')(grunt);

  // Default task(s)
  grunt.registerTask('default', ['watch']);

};
