#!/home/seijiro/.rbenv/shims/ruby
#/usr/bin/env ruby
# -*- ruby -*-
#
# $Date$
# $Rev$
#
require 'cgi'
require 'digest/md5'
#require 'sdbm'
require 'gdbm'

cgi = CGI.new("html3")

id = cgi.params['id'][0].read
imagedata = cgi.params['imagedata'][0].read
hash = Digest::MD5.hexdigest(imagedata)

create_newid = false
if not id or id == "" then
    id = Digest::MD5.hexdigest(cgi.remote_addr + Time.now.to_s)
    create_newid = true
end

#dbm = SDBM.open('/var/www/html/db/id',0644)
dbm = GDBM.open('/var/www/gyazo/db/id',0644)
dbm[hash] = id
dbm.close

File.open("data/#{hash}.png","w").print(imagedata)

headers = {}
if create_newid then
    headers = {"X-Gyazo-Id"=>id}
end

cgi.out(headers){"https://gyazo.lovesaemi.daemon.asia/data/#{hash}.png"}
