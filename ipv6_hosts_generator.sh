#!/bin/zsh

rm hosts *tmp* hosts.conf

echo "Down loading IPV6 Hosts from lennylxx"
wget https://raw.githubusercontent.com/lennylxx/ipv6-hosts/master/hosts

echo "Transcoding..."
sed 's/[#].*$//' hosts > hosts.tmp
sed '/^[[:space:]]*$/d' hosts.tmp > hosts.tmp.1
tr -d "$(printf '\015')" < hosts.tmp.1 > hosts.tmp.2

echo "Generating IPV6 hosts config file"
./hosts2surge.php hosts.tmp.2
tr -d "$(printf '\015')" < hosts.conf > hosts_$(date +%Y-%m-%d).conf

echo "cleaning up"
rm hosts *tmp* hosts.conf

echo "bye."
