module.exports = function(grunt) {

  require('time-grunt')(grunt);
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    watch: {
      css: {
				files: './sass/**/*.scss',
				tasks: ['styles']
			}
    },

    sass: {
        dev: {
          files: {
            'style.css': './sass/style.scss'
          }
        }
    },

  browserSync: {
      default_options: {
        bsFiles: {
          src: [
            'style.css'
          ]
        },
        options: {
          watchTask: true,
          proxy: "http://localhost"
        }
      }
    }


  });

  grunt.registerTask('default', ['styles', 'browserSync', 'watch']);
  grunt.registerTask('styles', ['sass']);
};
