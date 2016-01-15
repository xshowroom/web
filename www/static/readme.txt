**********************************
js压缩文件执行步骤
**********************************
1. 安装nodejs
2. 安装grunt客户端   npm install -g grunt-cli
3. 指定static文件目录
4. 根据gruntfile.js安装指定插件  npm install --save-dev
5. 安装插件 npm install grunt-contrib-uglify --save-dev
6. 执行压缩js任务   grunt uglify