/*global module:false*/
module.exports = function(grunt) {

	// load all grunt tasks
	require( 'load-grunt-tasks' )( grunt );

	// Project configuration.
	grunt.initConfig({

		config: grunt.file.readJSON( 'config.json' ),

		clean: {
			development: {
				src: [ 
					'<%= config.dist %>/*.php',
					'<%= config.dist %>/page-templates/*.php',
					'<%= config.dist %>/*.png',
					'<%= config.dist %>/fonts/*.*',
					'<%= config.dist %>/js/scripts.js',
					'<%= config.dist %>/images/*.*',
					'<%= config.dist %>/videos/*.*',
				]
			},
		},

		copy: {
			development: {
				expand: true,
				dest: '<%= config.dist %>/',
				cwd: '<%= config.src %>/',
				src: [ 
					'*.php',
					'page-templates/*.php', 
					'*.png', 
					'fonts/*.*', 
					'js/*.*', 
					'images/*.*', 
					'videos/*.*' ]
			},
		},

		webfont: {
			development: {
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
			development: {
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

		less: {
			development: {
				files: {
					'<%= config.dist %>/style.css': '<%= config.src %>/styles/style.less'
				}
			},
			production: {
				options: {
					cleancss: true,
				},
				files: {
					'<%= config.dist %>/style.css': '<%= config.src %>/styles/style.less'
				}
			}
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
			production: {
				src: '<%= config.dist %>/style.css'
			},
		},

		jshint: {
			options: {
				jshintrc: '.jshintrc',
				reporter: require( 'jshint-stylish' )
			},
			development: [
				'Gruntfile.js',
			]
		},

		bower_concat: {
			development: {
				dest: '<%= config.dist %>/js/libs.js',
				dependencies: {
					// 'bootstrap': 'jquery',
				},
				exclude: [
			        'jquery',
			    ],
			}
		},

		concat: {
			development: {
				src: [
					'<%= config.src %>/scripts/scripts.js',
				],
				dest: '<%= config.dist %>/js/scripts.js'
			}
		},

		uglify: {},

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
	});

	grunt.registerTask( 'prepare:development', [

		'clean:development',
		'copy:development',
		'less:development',
		'webfont:development',
		'rename:development',
		'autoprefixer:development',
		'jshint:development',
		'bower_concat:development',
		'concat:development',
	]);

	grunt.registerTask( 'development', [

		'prepare:development',
		'open:development',
		'watch:development'
	]);

	grunt.registerTask( 'acceptance', [

		'prepare:development',
		// 'ftp-deploy:acceptance',
	]);

	grunt.registerTask( 'production', [

		'prepare:development',
		// 'ftp-deploy:production',
	]);
};