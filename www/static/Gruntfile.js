module.exports = function(grunt) {
	grunt.initConfig({
		pkg : grunt.file.readJSON('package.json'),
		uglify : {
			options : {
				banner : '/*! <%= pkg.name %> - v<%= pkg.version %> - '
						+ '<%= grunt.template.today("yyyy-mm-dd") %> */'
			},
			target : {
				files : [ {
					expand : true,
					cwd : 'app/modules',
					src : [ '**/*.js', '**/*.*.js', '**/!*.min.js', '**/!*.*.min.js'],
					dest : 'app/modules'
				} ]
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-uglify');
	
	grunt.registerTask('default', ['uglify']);  
};
