#!/bin/zsh

rm hosts *tmp* hosts.conf

echo "Down loading IPV4 Hosts from Googlehosts project"
wget https://raw.githubusercontent.com/googlehosts/hosts/master/hosts-files/hosts

echo "Transcoding..."
sed 's/[#].*$//' hosts > hosts.tmp
sed '/^[[:space:]]*$/d' hosts.tmp > hosts.tmp.1
tr -d "$(printf '\015')" < hosts.tmp.1 > hosts.tmp.2

echo "Generating IPV6 hosts config file"
./hosts2surge.php hosts.tmp.2
tr -d "$(printf '\015')" < hosts.conf > hosts_ipv4_$(date +%Y-%m-%d).conf

echo "cleaning up"
rm hosts *tmp* hosts.conf

echo "bye."
