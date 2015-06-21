/*global module:false*/
module.exports = function(grunt) {

	// load all grunt tasks
	require( 'load-grunt-tasks' )( grunt );

	// Project configuration.
	grunt.initConfig({

		config: grunt.file.readJSON( 'config.json' ),

		clean: {
			default: {
				src: [ 
					'<%= config.dist %>/*.php',
					'<%= config.dist %>/page-templates/*.php',
					'<%= config.dist %>/woocommerce/**/*.php',
					'<%= config.dist %>/*.png',
					'<%= config.dist %>/fonts/*.*',
					'<%= config.dist %>/js/scripts.js',
					'<%= config.dist %>/images/*.*',
					'<%= config.dist %>/videos/*.*',
				]
			},
		},

		copy: {
			default: {
				expand: true,
				dest: '<%= config.dist %>/',
				cwd: '<%= config.src %>/',
				src: [ 
					'*.php',
					'page-templates/*.php',
					'woocommerce/**/*.php',
					'*.png', 
					'fonts/*.*', 
					'js/*.*', 
					'images/*.*', 
					'videos/*.*' ]
			},
		},

		jshint: {
			options: {
				jshintrc: '.jshintrc',
				reporter: require( 'jshint-stylish' )
			},
			default: [
				'Gruntfile.js',
				'<%= config.src %>/scripts/**/*.js'
			]
		},

		concat: {
			default: {
				src: [
					'<%= config.src %>/scripts/scripts.js',
				],
				dest: '<%= config.dist %>/js/scripts.js'
			}
		},

		bower_concat: {
			default: {
				dest: '<%= config.dist %>/js/libs.js',
				dependencies: {},
				exclude: [
			        'jquery',
			        'doc-ready',
			        'eventEmitter',
			        'eventie',
			        'fizzy-ui-utils',
			        'get-size',
			        'get-style-property',
			        'matches-selector',
			        'outlayer'
			    ],
			    mainFiles: {
					'bootstrap': 'dist/js/bootstrap.min.js',
					'masonry': 'dist/masonry.pkgd.min.js',
				}
			}
		},

		less: {
			development: {
				files: {
					'<%= config.dist %>/style.css': '<%= config.src %>/styles/style.less'
				}
			},
			acceptance: {
				options: {
					cleancss: true,
				},
				files: {
					'<%= config.dist %>/style.css': '<%= config.src %>/styles/style.less'
				}
			}
		},

		uglify: {
			development: {
				files: {
					'<%= config.dist %>/js/libs.js': '<%= config.dist %>/js/libs.js'
				}
			},
			acceptance: {
				files: {
					'<%= config.dist %>/js/libs.js': '<%= config.dist %>/js/libs.js',
					'<%= config.dist %>/js/scripts.js': '<%= config.dist %>/js/scripts.js'
				}
			},
		},

		autoprefixer: {
			options: {
				browsers: [
					'Android 2.3',
					'Android >= 4',
					'Chrome >= 20',
					'Firefox >= 24', // Firefox 24 is the latest ESR
					'Explorer >= 8',
					'iOS >= 6',
					'Opera >= 12',
					'Safari >= 6'
				]
			},
			development: {
				src: '<%= config.dist %>/style.css'
			},
			acceptance: {
				src: '<%= config.dist %>/style.css'
			},
		},

		watch: {
			development: {
				files: [
					'Gruntfile.js',
					'<%= config.src %>/**/*.*',
					'!<%= config.src %>/styles/_icons.less',
				],
				tasks: [ 
					'prepare:development'
				],
				options: {
					livereload: true
				}
			}
		},

		open: {
			development: {
				path: '<%= config.local %>'
			}
		},

		// 'ftp-deploy': {
		// 	acceptance: {
		// 		auth: {
		// 			host: 'theidentitymanual.com',
		// 			port: 21,
		// 			authKey: 'acceptance',
		// 		},
		// 		src: '<%= config.dist %>',
		// 		dest: '<%= config.ftp_dist %>',
		// 		exclusions: [ '<%= config.dist %>/**/.DS_Store' ]
		// 	},
		// 	production: {
		// 		auth: {
		// 			host: 'theidentitymanual.com',
		// 			port: 21,
		// 			authKey: 'production',
		// 		},
		// 		src: '<%= config.dist %>',
		// 		dest: '<%= config.ftp_dist %>',
		// 		exclusions: [ '<%= config.dist %>/**/.DS_Store' ]
		// 	},
		// }

		webfont: {
			icons: {
				src: '<%= config.src %>/icons/*.svg',
				dest: '<%= config.dist %>/fonts/',
				destCss: '<%= config.src %>/styles/',
				options: {
					engine: 'node',
					font: 'icons',
					stylesheet: 'less',
					relativeFontPath: './fonts/',
					destHtml: '<%= config.src %>/icons/'
				}
			}
		},

		rename: {
			icons: {
				files: [
					{ 
						src: [
							'<%= config.src %>/styles/icons.less'
						],
						dest: [
							'<%= config.src %>/styles/_icons.less'
						]
					},
				]
			}
		},
	});

	grunt.registerTask( 'default', [

		'clean:default',
		'copy:default',
		'jshint:default',
		'concat:default',
		'bower_concat:default',
	]);

	grunt.registerTask( 'prepare:development', [

		'default',
		'less:development',
		'autoprefixer:development',
		'uglify:development',
	]);

	grunt.registerTask( 'development', [

		'prepare:development',
		'open:development',
		'watch:development'
	]);

	grunt.registerTask( 'acceptance', [

		'default',
		'less:acceptance',
		'autoprefixer:acceptance',
		'uglify:acceptance',
		// 'ftp-deploy:acceptance',
	]);

	grunt.registerTask( 'production', [

		'default',
		'less:acceptance',
		'autoprefixer:acceptance',
		'uglify:acceptance',
		// 'ftp-deploy:production',
	]);

	grunt.registerTask( 'icons', [

		'webfont:icons',
		'rename:icons',
	]);
};