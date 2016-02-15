#!/usr/bin/ruby
require 'erb'
require 'mysql'
class Squid_block_header
        def initialize data_port_header, data_block_url
		@data_port_header = data_port_header
		@data_block_url = data_block_url
	end
        def render path
                content = File.read(File.expand_path(path))
                t = ERB.new(content,nil,'%<>-')
                t.result(binding)
        end
end
class Time_file_header
        def initialize time_file
                @time_file = time_file
        end
        def render path
                content = File.read(File.expand_path(path))
                t = ERB.new(content,nil,'%<>-')
                t.result(binding)
        end
end

##########################################################################################################################


	`rm /etc/squid3/squid.conf` # delete file squid.conf before create new file

	con = Mysql.new 'localhost', 'root', 'qwerty', 'block' # connect sql


####################################################### open - close port ################################################


	data_port_header = con.query("SELECT * FROM `head_port`") # open and close port data
	data_block_url = con.query("SELECT `file_name`, `block_date_time` FROM block_url UNION SELECT `file_name`, `block_date_time` FROM block_url") 

	insert_squid_block = Squid_block_header.new(data_port_header,data_block_url) # insert data from query to class

	file_squid_block = File.open("/etc/squid3/squid.conf", 'w') # open file config
	file_squid_block.puts insert_squid_block.render("/var/www/html/oak2/template_squid_conf.erb") # sent data to template 
	file_squid_block.close # close file config


###################################################### block url ########################################################

	
	#file_time = con.query("SELECT time FROM block_url UNION SELECT time FROM block_url") # url data
	file_time = con.query("SELECT `file_name`,`block_date_time` FROM block_url UNION SELECT `file_name`,`block_date_time` FROM block_url")
	file_time.each_hash do |rows|
		url = rows['file_name']
		file_time_url = "/etc/squid3/#{rows['file_name']}"
		data_url = con.query("SELECT * FROM block_url WHERE `file_name` = '#{url}'")
		file_time = File.open(file_time_url, 'w')
		insert_file_time = Time_file_header.new(data_url)
		file_time.puts insert_file_time.render("/var/www/html/oak2/template_squid_file_time.erb")
		file_time.close # close file config
	end










