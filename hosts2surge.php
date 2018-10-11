#!/usr/bin/env php
<?php

if (!is_cli())
{
    exit('Please run script in CLI mode.');
}

function is_cli()
{
    return (PHP_SAPI === 'cli');
}

function println($str)
{
    echo $str . PHP_EOL;
    exit;
}

if (!isset($argv[1]))
{
    println('Please type hosts filename.');
}

$filename = $argv[1];
if (!is_file($filename))
{
    println($filename . ' not found.');
}

$datas = urlencode(file_get_contents($filename));
$datas = str_replace(array('%0A', '%09', '+'), array("\n", ' ', ' '), $datas);
$datas = preg_replace('/[ ]{1,}/', ' ', $datas);
$origin = explode("\n", $datas);

foreach ($origin as $key => $value)
{
    if ((strpos($value, '%23') !== false) || (trim($value) == ''))
    {
        unset($origin[$key]);
    }
}

foreach ($origin as $key => $value)
{
    $result[] = explode(' ', $value);
}

$export = '[General]
skip-proxy = 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, localhost, *.local
bypass-tun = 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12
loglevel = notify

[Rule]
# Adblock
DOMAIN-KEYWORD,analytics,REJECT
DOMAIN-KEYWORD,syndication,REJECT
DOMAIN-KEYWORD,cnzz,REJECT
DOMAIN-KEYWORD,tongji,REJECT
DOMAIN-KEYWORD,trace,REJECT
DOMAIN-KEYWORD,track,REJECT
DOMAIN-KEYWORD,usage,REJECT
DOMAIN-KEYWORD,51y5,REJECT
DOMAIN-KEYWORD,openx,REJECT
DOMAIN-KEYWORD,admaster,REJECT
DOMAIN-KEYWORD,adsage,REJECT
DOMAIN-KEYWORD,adsmogo,REJECT
DOMAIN-KEYWORD,doubleclick,REJECT
DOMAIN-KEYWORD,duomeng,REJECT
DOMAIN-KEYWORD,omgmta,REJECT
DOMAIN,csi.gstatic.com,REJECT
DOMAIN-SUFFIX,googleadservices.com,REJECT
DOMAIN-SUFFIX,googletagservices.com,REJECT
DOMAIN-SUFFIX,googleadsserving.cn,REJECT
DOMAIN-SUFFIX,googlesyndication.com,REJECT
DOMAIN-SUFFIX,google-analytics.com,REJECT
DOMAIN,fonts.googleapis.com,REJECT
DOMAIN,init.icloud-analysis.com,REJECT
DOMAIN,adlog.flurry.com,REJECT
DOMAIN,ads.flurry.com,REJECT
DOMAIN,alexa.links.cn,REJECT
DOMAIN,api.amplitude.com,REJECT
DOMAIN,api.instabug.com,REJECT
DOMAIN,api.mixpanel.com,REJECT
DOMAIN,api.segment.io,REJECT
DOMAIN,app.roximity.com,REJECT
DOMAIN,app.sysdigcloud.com,REJECT
DOMAIN,bam.nr-data.net,REJECT
DOMAIN,bi-collector.oneapm.com,REJECT
DOMAIN,cdn.mxpnl.com,REJECT
DOMAIN,collector.githubapp.com,REJECT
DOMAIN,counter.kingsoft.com,REJECT
DOMAIN,data.flurry.com,REJECT
DOMAIN,engine.mobileapptracking.com,REJECT
DOMAIN,js-agent.newrelic.com,REJECT
DOMAIN,log.cmbchina.com,REJECT
DOMAIN,log.tapatalk.com,REJECT
DOMAIN,log.umsns.com,REJECT
DOMAIN,pageviewp.icbc.com.cn,REJECT
DOMAIN,pixel.wp.com,REJECT
DOMAIN,stat.api.dianping.com,REJECT
DOMAIN-SUFFIX,51.la,REJECT
DOMAIN-SUFFIX,adjust.com,REJECT
DOMAIN-SUFFIX,adjust.io,REJECT
DOMAIN-SUFFIX,alipaylog.com,REJECT
DOMAIN-SUFFIX,beacon.tingyun.com,REJECT
DOMAIN-SUFFIX,cmcore.com,REJECT
DOMAIN-SUFFIX,coremetrics.com,REJECT
DOMAIN-SUFFIX,irs01.com,REJECT
DOMAIN-SUFFIX,madmini.com,REJECT
DOMAIN-SUFFIX,mmstat.com,REJECT
DOMAIN-SUFFIX,optimizelyapis.com,REJECT
DOMAIN-SUFFIX,segment.com,REJECT
DOMAIN-SUFFIX,sitemeter.com,REJECT
DOMAIN-SUFFIX,statcounter.com,REJECT
DOMAIN-SUFFIX,wrating.com,REJECT
DOMAIN,ads.mopub.com,REJECT
DOMAIN,api.adform.com,REJECT
DOMAIN,api.tapstream.com,REJECT
DOMAIN,e.apsalar.com,REJECT
DOMAIN-SUFFIX,99click.com,REJECT
DOMAIN-SUFFIX,acs86.com,REJECT
DOMAIN-SUFFIX,adchina.com,REJECT
DOMAIN-SUFFIX,adcome.cn,REJECT
DOMAIN-SUFFIX,adinfuse.com,REJECT
DOMAIN-SUFFIX,admob.com,REJECT
DOMAIN-SUFFIX,adnxs.com,REJECT
DOMAIN-SUFFIX,ads.yahoo.com,REJECT
DOMAIN-SUFFIX,adsame.com,REJECT
DOMAIN-SUFFIX,aduu.cn,REJECT
DOMAIN-SUFFIX,advertising.com,REJECT
DOMAIN-SUFFIX,adview.cn,REJECT
DOMAIN-SUFFIX,adwhirl.com,REJECT
DOMAIN-SUFFIX,adwo.com,REJECT
DOMAIN-SUFFIX,adxmi.com,REJECT
DOMAIN-SUFFIX,adzerk.net,REJECT
DOMAIN-SUFFIX,allyes.com,REJECT
DOMAIN-SUFFIX,anquan.org,REJECT
DOMAIN-SUFFIX,appads.com,REJECT
DOMAIN-SUFFIX,appboy.com,REJECT
DOMAIN-SUFFIX,applifier.com,REJECT
DOMAIN-SUFFIX,applovin.com,REJECT
DOMAIN-SUFFIX,appsflyer.com,REJECT
DOMAIN-SUFFIX,baifendian.com,REJECT
DOMAIN-SUFFIX,biddingx.com,REJECT
DOMAIN-SUFFIX,chance-ad.com,REJECT
DOMAIN-SUFFIX,chartboost.com,REJECT
DOMAIN-SUFFIX,clicktracks.com,REJECT
DOMAIN-SUFFIX,clickzs.com,REJECT
DOMAIN-SUFFIX,domob.cn,REJECT
DOMAIN-SUFFIX,domob.com.cn,REJECT
DOMAIN-SUFFIX,domob.org,REJECT
DOMAIN-SUFFIX,guohead.com,REJECT
DOMAIN-SUFFIX,guomob.com,REJECT
DOMAIN-SUFFIX,happyelements.cn,REJECT
DOMAIN-SUFFIX,immob.cn,REJECT
DOMAIN-SUFFIX,inmobi.com,REJECT
DOMAIN-SUFFIX,intely.cn,REJECT
DOMAIN-SUFFIX,ipinyou.com,REJECT
DOMAIN-SUFFIX,istreamsche.com,REJECT
DOMAIN-SUFFIX,kejet.net,REJECT
DOMAIN-SUFFIX,localytics.com,REJECT
DOMAIN-SUFFIX,mediav.com,REJECT
DOMAIN-SUFFIX,miaozhen.com,REJECT
DOMAIN-SUFFIX,miidi.net,REJECT
DOMAIN-SUFFIX,mobclix.com,REJECT
DOMAIN-SUFFIX,mobfox.com,REJECT
DOMAIN-SUFFIX,mobisage.cn,REJECT
DOMAIN-SUFFIX,o2omobi.com,REJECT
DOMAIN-SUFFIX,oadz.com,REJECT
DOMAIN-SUFFIX,optaim.com,REJECT
DOMAIN-SUFFIX,optimix.asia,REJECT
DOMAIN-SUFFIX,pubmatic.com,REJECT
DOMAIN-SUFFIX,qtmojo.cn,REJECT
DOMAIN-SUFFIX,qtmojo.com,REJECT
DOMAIN-SUFFIX,quantserve.com,REJECT
DOMAIN-SUFFIX,reachmax.cn,REJECT
DOMAIN-SUFFIX,responsys.net,REJECT
DOMAIN-SUFFIX,scorecardresearch.com,REJECT
DOMAIN-SUFFIX,serving-sys.com,REJECT
DOMAIN-SUFFIX,smartmad.com,REJECT
DOMAIN-SUFFIX,smartadserver.com,REJECT
DOMAIN-SUFFIX,sponsorpay.com,REJECT
DOMAIN-SUFFIX,switchadhub.com,REJECT
DOMAIN-SUFFIX,tanx.com,REJECT
DOMAIN-SUFFIX,tapjoyads.com,REJECT
DOMAIN-SUFFIX,thoughtleadr.com,REJECT
DOMAIN-SUFFIX,tiqcdn.com,REJECT
DOMAIN-SUFFIX,umeng.co,REJECT
DOMAIN-SUFFIX,umeng.com,REJECT
DOMAIN-SUFFIX,umeng.net,REJECT
DOMAIN-SUFFIX,unimhk.com,REJECT
DOMAIN-SUFFIX,unlitui.com,REJECT
DOMAIN-SUFFIX,uyunad.com,REJECT
DOMAIN-SUFFIX,vamaker.com,REJECT
DOMAIN-SUFFIX,vpon.com,REJECT
DOMAIN-SUFFIX,waps.cn,REJECT
DOMAIN-SUFFIX,wiyun.com,REJECT
DOMAIN-SUFFIX,wooboo.com.cn,REJECT
DOMAIN-SUFFIX,wqmobile.com,REJECT
DOMAIN-SUFFIX,xibao100.com,REJECT
DOMAIN-SUFFIX,youmi.net,REJECT
DOMAIN-SUFFIX,zhiziyun.com,REJECT
DOMAIN-SUFFIX,10up.com,REJECT
DOMAIN-SUFFIX,114la.com,REJECT
DOMAIN-SUFFIX,cl3.webterren.com,REJECT
DOMAIN-SUFFIX,cl.webterren.com,REJECT
DOMAIN-SUFFIX,ad.cctv.com,REJECT
DOMAIN-SUFFIX,168.it168.com,REJECT
DOMAIN-SUFFIX,comic.hanhande.com,REJECT
DOMAIN-SUFFIX,cps.laifeng.com,REJECT
DOMAIN-SUFFIX,capp.simsimi.com,REJECT
DOMAIN-SUFFIX,mgid.com,REJECT
DOMAIN-SUFFIX,ad-stir.com,REJECT
DOMAIN-SUFFIX,gssprt.jp,REJECT
DOMAIN-SUFFIX,union.6.cn,REJECT
DOMAIN-SUFFIX,t.cr-nielsen.com,REJECT
DOMAIN-SUFFIX,simba.6.cn,REJECT
DOMAIN-SUFFIX,shrek.6.cn,REJECT
DOMAIN-SUFFIX,rtb.behe.com,REJECT
DOMAIN-SUFFIX,match.rtbidder.net,REJECT
DOMAIN-SUFFIX,logstat.t.sfht.com,REJECT
DOMAIN-SUFFIX,kwflvcdn.000dn.com,REJECT
DOMAIN-SUFFIX,gg.jtertp.com,REJECT
DOMAIN-SUFFIX,d.dsp.imageter.com,REJECT
DOMAIN-SUFFIX,cc.xtgreat.com,REJECT
DOMAIN-SUFFIX,c.algovid.com,REJECT
DOMAIN,ads.ak.facebook.com,REJECT
DOMAIN,creative.ak.facebook.com,REJECT
DOMAIN,creative.ak.fbcdn.net,REJECT
DOMAIN,fbcdn-creative-a.akamaihd.net,REJECT
DOMAIN-SUFFIX,staticxx.facebook.com,REJECT
DOMAIN,cdn.syndication.twimg.com,REJECT
DOMAIN,syndication-o.twimg.com,REJECT
DOMAIN,syndication.twimg.com,REJECT
DOMAIN-SUFFIX,ads.twitter.com,REJECT
DOMAIN-SUFFIX,ads-twitter.com,REJECT
DOMAIN-SUFFIX,analytics.twitter.com,REJECT
DOMAIN-SUFFIX,p.twitter.com,REJECT
DOMAIN-SUFFIX,scribe.twitter.com,REJECT
DOMAIN-SUFFIX,syndication.twitter.com,REJECT
DOMAIN-SUFFIX,syndication-o.twitter.com,REJECT
DOMAIN-SUFFIX,urls.api.twitter.com,REJECT
DOMAIN,ad-beta.flipboard.com,REJECT
DOMAIN,ad.flipboard.com,REJECT
DOMAIN-SUFFIX,l.qq.com,REJECT
DOMAIN-SUFFIX,beacon.qq.com,REJECT
DOMAIN-SUFFIX,btrace.qq.com,REJECT
DOMAIN-SUFFIX,bugly.qq.com,REJECT
DOMAIN-SUFFIX,pingtcss.qq.com,REJECT
DOMAIN-SUFFIX,report.qq.com,REJECT
DOMAIN,monitor.uu.qq.com,REJECT
DOMAIN,pingjs.qq.com,REJECT
DOMAIN,pingma.qq.com,REJECT
DOMAIN,tajs.qq.com,REJECT
DOMAIN,tcss.qq.com,REJECT
DOMAIN,adsolution.imtt.qq.com,REJECT
DOMAIN,adsense.html5.qq.com,REJECT
DOMAIN,mqqad.cs0309.html5.qq.com,REJECT
DOMAIN,mqqad.html5.qq.com,REJECT
DOMAIN,tpush.html5.qq.com,REJECT
DOMAIN,adsview.qq.com,REJECT
DOMAIN,adsclick.qq.com,REJECT
DOMAIN-SUFFIX,adsfile.qq.com,REJECT
DOMAIN,adsgroup.qq.com,REJECT
DOMAIN,adshmct.qq.com,REJECT
DOMAIN,adshmmsg.qq.com,REJECT
DOMAIN,adslvfile.qq.com,REJECT
DOMAIN,adslvseed.qq.com,REJECT
DOMAIN,adsqqclick.qq.com,REJECT
DOMAIN,adsrich.qq.com,REJECT
DOMAIN,adstextview.qq.com,REJECT
DOMAIN,adsview2.qq.com,REJECT
DOMAIN,wa.gtimg.com,REJECT
DOMAIN,wb.gtimg.com,REJECT
DOMAIN,b.gtimg.com,REJECT
DOMAIN,lb.gtimg.com,REJECT
DOMAIN,tui.gtimg.com,REJECT
DOMAIN,ra.gtimg.com,REJECT
DOMAIN,swa.gtimg.com,REJECT
DOMAIN,la.gtimg.com,REJECT
DOMAIN,pgdt.gtimg.cn,REJECT
DOMAIN-SUFFIX,gdt.qq.com,REJECT
DOMAIN,analy.qq.com,REJECT
DOMAIN,appstore.qzone.qq.com,REJECT
DOMAIN,3gimg.qq.com,REJECT
DOMAIN,sqimg.qq.com,REJECT
DOMAIN,ac.o2.qq.com,REJECT
DOMAIN,jqmt.qq.com,REJECT
DOMAIN,jsqmt.qq.com,REJECT
DOMAIN,mapp.qzone.qq.com,REJECT
DOMAIN-SUFFIX,boss.qzone.qq.com,REJECT
DOMAIN,masdk.3g.qq.com,REJECT
DOMAIN,mini2015.qq.com,REJECT
DOMAIN,p.store.qq.com,REJECT
DOMAIN,s.isdspeed.qq.com,REJECT
DOMAIN,s.pcapps.qq.com,REJECT
DOMAIN-SUFFIX,e.qq.com,REJECT
DOMAIN,stdl.qq.com,REJECT
DOMAIN,ta.qq.com,REJECT
DOMAIN,video.ureport.push.qq.com,REJECT
DOMAIN,video.wap.mpush.qq.com,REJECT
DOMAIN,aid.video.qq.com,REJECT
DOMAIN-SUFFIX,btrace.video.qq.com,REJECT
DOMAIN-SUFFIX,pmir.3g.qq.com,REJECT
DOMAIN-SUFFIX,tools.3g.qq.com,REJECT
DOMAIN-SUFFIX,szexshort.weixin.qq.com,REJECT
DOMAIN-SUFFIX,rcgi.video.qq.com,REJECT
DOMAIN,vmindhls.tc.qq.com,REJECT
DOMAIN,l.aiseet.atianqi.com,REJECT
DOMAIN,safe.ucweb.com,REJECT
DOMAIN,ucan.25pp.com,REJECT
DOMAIN,ucdb.25pp.com,REJECT
DOMAIN,android-artworks.25pp.com,REJECT
DOMAIN-SUFFIX,ccs.ucweb.com,REJECT
DOMAIN-SUFFIX,api.mp.uc.cn,REJECT
DOMAIN-SUFFIX,applog.uc.cn,REJECT
DOMAIN-SUFFIX,client.video.ucweb.com,REJECT
DOMAIN-SUFFIX,cms.ucweb.com,REJECT
DOMAIN-SUFFIX,dispatcher.upmc.uc.cn,REJECT
DOMAIN-SUFFIX,huichuan.sm.cn,REJECT
DOMAIN-SUFFIX,iflow.uczzd.com,REJECT
DOMAIN-SUFFIX,iflow.uczzd.com.cn,REJECT
DOMAIN-SUFFIX,iflow.uczzd.net,REJECT
DOMAIN-SUFFIX,log.cs.pp.cn,REJECT
DOMAIN-SUFFIX,m.uczzd.cn,REJECT
DOMAIN-SUFFIX,patriot.cs.pp.cn,REJECT
DOMAIN-SUFFIX,puds.ucweb.com,REJECT
DOMAIN-SUFFIX,server.m.pp.cn,REJECT
DOMAIN-SUFFIX,track.uc.cn,REJECT
DOMAIN-SUFFIX,u.uc123.com,REJECT
DOMAIN-SUFFIX,u.ucfly.com,REJECT
DOMAIN-SUFFIX,uc.ucweb.com,REJECT
DOMAIN-SUFFIX,ucsec.ucweb.com,REJECT
DOMAIN-SUFFIX,ucsec1.ucweb.com,REJECT
DOMAIN-SUFFIX,confirmation.gameloft.com,REJECT
DOMAIN-SUFFIX,ingameads.gameloft.com,REJECT
DOMAIN-SUFFIX,ssp-ces.gameloft.com,REJECT
DOMAIN,gllive-beta.gameloft.com,REJECT
DOMAIN,gllive.gameloft.com,REJECT
DOMAIN,imp-mdsp.avazutracking.net,REJECT
DOMAIN-SUFFIX,adgeo.163.com,REJECT
DOMAIN-SUFFIX,bobo.163.com,REJECT
DOMAIN-SUFFIX,fa.163.com,REJECT
DOMAIN-SUFFIX,g.163.com,REJECT
DOMAIN-SUFFIX,gb.corp.163.com,REJECT
DOMAIN-SUFFIX,temp.163.com,REJECT
DOMAIN-SUFFIX,analytics.163.com,REJECT
DOMAIN,union.163.com,REJECT
DOMAIN,rd.da.netease.com,REJECT
DOMAIN,crashlytics.163.com,REJECT
DOMAIN,count.mail.163.com,REJECT
DOMAIN,r.mail.163.com,REJECT
DOMAIN,g1.163.com,REJECT
DOMAIN,adc.163.com,REJECT
DOMAIN,adclient.163.com,REJECT
DOMAIN,adimg.163.com,REJECT
DOMAIN,admail.163.com,REJECT
DOMAIN,adpmt.mail.163.com,REJECT
DOMAIN,allyes.nie.163.com,REJECT
DOMAIN,corp.163.com,REJECT
DOMAIN,cpc.163.com,REJECT
DOMAIN,ntes-analytics.163.com,REJECT
DOMAIN,popme.163.com,REJECT
DOMAIN,pro.163.com,REJECT
DOMAIN,proimg.163.com,REJECT
DOMAIN,rec.g.163.com,REJECT
DOMAIN,union.163.com,REJECT
DOMAIN-SUFFIX,dsp.youdao.com,REJECT
DOMAIN-SUFFIX,dsp-impr.youdao.com,REJECT
DOMAIN-SUFFIX,dsp-impr2.youdao.com,REJECT
DOMAIN-SUFFIX,rlogs.youdao.com,REJECT
DOMAIN-SUFFIX,union.youdao.com,REJECT
DOMAIN-SUFFIX,c.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.youdao.com,REJECT
DOMAIN-SUFFIX,impservice2.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.union.youdao.com,REJECT
DOMAIN-SUFFIX,shared.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.chnl.youdao.com,REJECT
DOMAIN,impservice.dictapp.youdao.com,REJECT
DOMAIN-SUFFIX,impservice-test.dictapp.youdao.com,REJECT
DOMAIN,impservice.dictweb.youdao.com,REJECT
DOMAIN,a.youdao.com,REJECT
DOMAIN,b.clkservice.youdao.com,REJECT
DOMAIN,clkservice.mail.youdao.com,REJECT
DOMAIN,clkservice.union.youdao.com,REJECT
DOMAIN,clkservice.youdao.com,REJECT
DOMAIN,clkservice2.dict.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.dict.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.dictapp.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.dictvista.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.dictweb.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.dictword.youdao.com,REJECT
DOMAIN-SUFFIX,impservice.mail.youdao.com,REJECT
DOMAIN,conv.youdao.com,REJECT
DOMAIN,d.clkservice.youdao.com,REJECT
DOMAIN,feedback.youdao.com,REJECT
DOMAIN,i.clkservice.youdao.com,REJECT
DOMAIN,nc045x.corp.youdao.com,REJECT
DOMAIN,rlogs.youdao.com,REJECT
DOMAIN,s.clkservice.youdao.com,REJECT
DOMAIN,tb060x.corp.youdao.com,REJECT
DOMAIN,tb104x.corp.youdao.com,REJECT
DOMAIN,toolbar.youdao.com,REJECT
DOMAIN-SUFFIX,oimagea2.ydstatic.com,REJECT
DOMAIN,adpublish.ydstatic.com,REJECT
DOMAIN,oimagea3.ydstatic.com,REJECT
DOMAIN,oimageb1.ydstatic.com,REJECT
DOMAIN,oimageb2.ydstatic.com,REJECT
DOMAIN,oimagec5.ydstatic.com,REJECT
DOMAIN,oimageb8.ydstatic.com,REJECT
DOMAIN-SUFFIX,ws.126.net,REJECT
DOMAIN,android.push.126.net,REJECT
DOMAIN,img1.126.net,REJECT
DOMAIN,img2.126.net,REJECT
DOMAIN,mimg.126.net,REJECT
DOMAIN,news.push.126.net,REJECT
DOMAIN,m.analytics.126.net,REJECT
DOMAIN-SUFFIX,wanproxy.127.net,REJECT
DOMAIN-SUFFIX,wangroup.127.net,REJECT
DOMAIN,haitaoad.nosdn.127.net,REJECT
DOMAIN,gad.netease.com,REJECT
DOMAIN,mr.da.netease.com,REJECT
DOMAIN,pr.da.netease.com,REJECT
DOMAIN,statis.push.netease.com,REJECT
DOMAIN,wr.da.netease.com,REJECT
DOMAIN,union.netease.com,REJECT
DOMAIN,stat.nm.netease.com,REJECT
DOMAIN,f1.p0y.cn,REJECT
DOMAIN,f2.p0y.cn,REJECT
DOMAIN-SUFFIX,pagechoice.net,REJECT
DOMAIN-SUFFIX,prom.gome.com.cn,REJECT
DOMAIN-SUFFIX,static.flv.uuzuonline.com,REJECT
DOMAIN-SUFFIX,love.bobo.com,REJECT
DOMAIN-SUFFIX,baidustatic.com,REJECT
DOMAIN-SUFFIX,baidutv.baidu.com,REJECT
DOMAIN-SUFFIX,bar.baidu.com,REJECT
DOMAIN-SUFFIX,boscdn.bpc.baidu.com,REJECT
DOMAIN-SUFFIX,pos.baidu.com,REJECT
DOMAIN-SUFFIX,baichuan.baidu.com,REJECT
DOMAIN-SUFFIX,tuisong.baidu.com,REJECT
DOMAIN-SUFFIX,adm.baidu.com,REJECT
DOMAIN-SUFFIX,api.youqian.baidu.com,REJECT
DOMAIN-SUFFIX,as.baidu.com,REJECT
DOMAIN-SUFFIX,cbjs.baidu.com,REJECT
DOMAIN-SUFFIX,cpro.baidu.com,REJECT
DOMAIN-SUFFIX,cpro.tieba.baidu.com,REJECT
DOMAIN-SUFFIX,cpro.zhidao.baidu.com,REJECT
DOMAIN-SUFFIX,hm.baidu.com,REJECT
DOMAIN-SUFFIX,hc.baidu.com,REJECT
DOMAIN-SUFFIX,c.baidu.com,REJECT
DOMAIN-SUFFIX,cjhq.baidu.com,REJECT
DOMAIN-SUFFIX,hmma.baidu.com,REJECT
DOMAIN-SUFFIX,ma.baidu.com,REJECT
DOMAIN-SUFFIX,mobads.baidu.com,REJECT
DOMAIN-SUFFIX,mobads-logs.baidu.com,REJECT
DOMAIN-SUFFIX,nsclick.baidu.com,REJECT
DOMAIN-SUFFIX,rj.baidu.com,REJECT
DOMAIN-SUFFIX,ucstat.baidu.com,REJECT
DOMAIN-SUFFIX,wangmeng.baidu.com,REJECT
DOMAIN-SUFFIX,wm.baidu.com,REJECT
DOMAIN-SUFFIX,api.m.baidu.com,REJECT
DOMAIN-SUFFIX,zhanzhang.baidu.com,REJECT
DOMAIN-SUFFIX,znsv.baidu.com,REJECT
DOMAIN-SUFFIX,cbjslog.baidu.com,REJECT
DOMAIN-SUFFIX,zz.bdstatic.com,REJECT
DOMAIN-SUFFIX,eiv.baidu.com,REJECT
DOMAIN-SUFFIX,a.baidu.com,REJECT
DOMAIN-SUFFIX,drmcmm.baidu.com,REJECT
DOMAIN-SUFFIX,e.baidu.com,REJECT
DOMAIN,dj1.baidu.com,REJECT
DOMAIN,eclick.baidu.com,REJECT
DOMAIN,entry.baidu.com,REJECT
DOMAIN,mtj.baidu.com,REJECT
DOMAIN,spcode.baidu.com,REJECT
DOMAIN,ucstat.baidu.com,REJECT
DOMAIN,union.baidu.com,REJECT
DOMAIN,static.pay.baidu.com,REJECT
DOMAIN,img.taotaosou.cn,REJECT
DOMAIN,img01.taotaosou.cn,REJECT
DOMAIN-SUFFIX,imageplus.baidu.com,REJECT
DOMAIN-SUFFIX,cpro.baidu.com.cn,REJECT
DOMAIN,res.limei.com,REJECT
DOMAIN,res.cocounion.com,REJECT
DOMAIN-SUFFIX,itsdata.map.baidu.com,REJECT
DOMAIN-SUFFIX,static.map.bdimg.com,REJECT
DOMAIN-SUFFIX,log.nuomi.com,REJECT
DOMAIN-SUFFIX,dcps.nuomi.com,REJECT
DOMAIN-SUFFIX,log.waimai.baidu.com,REJECT
DOMAIN,bzclk.baidu.com,REJECT
DOMAIN-SUFFIX,simaba.taobao.com,REJECT
DOMAIN-SUFFIX,tns.simba.taobao.com,REJECT
DOMAIN-SUFFIX,show.re.taobao.com,REJECT
DOMAIN,adash.m.taobao.com,REJECT
DOMAIN,adsh.m.taobao.com,REJECT
DOMAIN,c-adash.m.taobao.com,REJECT
DOMAIN,apoll.m.taobao.com,REJECT
DOMAIN-SUFFIX,strip.taobaocdn.com,REJECT
DOMAIN-SUFFIX,pics.taobaocdn.com,REJECT
DOMAIN,ope.tanx.com,REJECT
DOMAIN,p.tanx.com,REJECT
DOMAIN,df.tanx.com,REJECT
DOMAIN,cdn.tanx.com,REJECT
DOMAIN,pcookie.tanx.com,REJECT
DOMAIN,hydra.alibaba.com,REJECT
DOMAIN,acjs.aliyun.com,REJECT
DOMAIN-SUFFIX,atanx.alicdn.com,REJECT
DOMAIN,gma.alicdn.com,REJECT
DOMAIN-SUFFIX,afp.alicdn.com,REJECT
DOMAIN-SUFFIX,g.alicdn.com,REJECT
DOMAIN,asearch.alicdn.com,REJECT
DOMAIN,atanx2.alicdn.com,REJECT
DOMAIN,d.dropbox.com,REJECT
DOMAIN,dl-debug.dropbox.com,REJECT
DOMAIN,dsp.lomark.cn,REJECT
DOMAIN,logger.instagram.com,REJECT
DOMAIN-SUFFIX,amazon-adsystem.com,REJECT
DOMAIN,1.wps.cn,REJECT
DOMAIN,img1.pcfg.cache.wps.cn,REJECT
DOMAIN,minfo.wps.cn,REJECT
DOMAIN,moupdate10332052.wps.cn,REJECT
DOMAIN,pcfg.wps.cn,REJECT
DOMAIN,push.wps.cn,REJECT
DOMAIN,ads-banner.1mobile.com,REJECT
DOMAIN,ads.1mobile.com,REJECT
DOMAIN,advertise.1mobile.com,REJECT
DOMAIN,log.advertise.1mobile.com,REJECT
DOMAIN,api.share2w.com,REJECT
DOMAIN,ad.adfurikun.jp,REJECT
DOMAIN,api.adfurikun.jp,REJECT
DOMAIN,i.adfurikun.jp,REJECT
DOMAIN,ipua.adfurikun.jp,REJECT
DOMAIN,spap.adingo.jp,REJECT
DOMAIN,spap.adingo.jp.eimg.jp,REJECT
DOMAIN,adfuri.socdm.com,REJECT
DOMAIN,cast-bid27-j.adtdp.com,REJECT
DOMAIN,n.amoad.com,REJECT
DOMAIN,sp.gmossp-sp.jp,REJECT
DOMAIN,spapi.i-mobile.co.jp,REJECT
DOMAIN,t.adcrops.net,REJECT
DOMAIN,ad6.liverail.com,REJECT
DOMAIN,d.appsdt.com,REJECT
DOMAIN,m.madthumbs.com,REJECT
DOMAIN,d.elong.cn,REJECT
DOMAIN,mhuodong.elong.com,REJECT
DOMAIN,rmw.jdburl.com,REJECT
DOMAIN,jdb.jiudingcapital.cn,REJECT
DOMAIN,jdb.jiudingcapital.com,REJECT
DOMAIN,hd.jiedaibao.com,REJECT
DOMAIN,lottery.kuaiya.cn,REJECT
DOMAIN,api.dewmobile.net,REJECT
DOMAIN,downloada.dewmobile.net,REJECT
DOMAIN,downloadb.dewmobile.net,REJECT
DOMAIN,123.click.kakamobi.cn,REJECT
DOMAIN,789.kakamobi.cn,REJECT
DOMAIN,smart.789.kakamobi.cn,REJECT
DOMAIN,smart.789.image.mucang.cn,REJECT
DOMAIN,dc.ie.027ie.com,REJECT
DOMAIN,ic.ie.027ie.com,REJECT
DOMAIN,dd713.bj.bcebos.com,REJECT
DOMAIN,vv84.bj.bcebos.com,REJECT
DOMAIN,t1.jzkapp.com,REJECT
DOMAIN,t2.jzkapp.com,REJECT
DOMAIN,cq01-cm-et01.cq01.baidu.com,REJECT
DOMAIN,marketing.etouch.cn,REJECT
DOMAIN,pclog.suishenyun.net,REJECT
DOMAIN,client-dmp.suishenyun.cn,REJECT
DOMAIN,log-dmp.suishenyun.cn,REJECT
DOMAIN,cdn.youhui.cn,REJECT
DOMAIN,emb.500.com,REJECT
DOMAIN-SUFFIX,atm.sina.com,REJECT
DOMAIN-SUFFIX,u1.img.mobile.sina.cn,REJECT
DOMAIN-SUFFIX,cre.dp.sina.cn,REJECT
DOMAIN-SUFFIX,dmp.sina.cn,REJECT
DOMAIN-SUFFIX,sax.sina.cn,REJECT
DOMAIN-SUFFIX,tjs.sjs.sinajs.cn,REJECT
DOMAIN,adimg.mobile.sina.cn,REJECT
DOMAIN,newspush.sinajs.cn,REJECT
DOMAIN,sdkclick.mobile.sina.cn,REJECT
DOMAIN,trends.mobile.sina.cn,REJECT
DOMAIN,wbclick.mobile.sina.cn,REJECT
DOMAIN,wbpctips.mobile.sina.cn,REJECT
DOMAIN,ota.pay.mobile.sina.cn,REJECT
DOMAIN,pay.mobile.sina.cn,REJECT
DOMAIN,sdkapp.mobile.sina.cn,REJECT
DOMAIN,wbapp.mobile.sina.cn,REJECT
DOMAIN-SUFFIX,beacon.sina.com.cn,REJECT
DOMAIN-SUFFIX,adm.leju.sina.com.cn,REJECT
DOMAIN-SUFFIX,ad.sina.com.cn,REJECT
DOMAIN-SUFFIX,dcads.sina.com.cn,REJECT
DOMAIN-SUFFIX,log.mix.sina.com.cn,REJECT
DOMAIN,d0.sina.com.cn,REJECT
DOMAIN,d1.sina.com.cn,REJECT
DOMAIN,d2.sina.com.cn,REJECT
DOMAIN,d3.sina.com.cn,REJECT
DOMAIN,d4.sina.com.cn,REJECT
DOMAIN,d5.sina.com.cn,REJECT
DOMAIN,d6.sina.com.cn,REJECT
DOMAIN,d7.sina.com.cn,REJECT
DOMAIN,d8.sina.com.cn,REJECT
DOMAIN,d9.sina.com.cn,REJECT
DOMAIN,sax.sina.com.cn,REJECT
DOMAIN,storage.wax.weibo.com,REJECT
DOMAIN,biz.weibo.com,REJECT
DOMAIN,c.biz.weibo.com,REJECT
DOMAIN,game.weibo.com,REJECT
DOMAIN,c.wcpt.biz.weibo.com,REJECT
DOMAIN,s.alitui.weibo.com,REJECT
DOMAIN,zc.biz.weibo.com,REJECT
DOMAIN,zymo.mps.weibo.com,REJECT
DOMAIN-SUFFIX,gw5.push.mcp.weibo.cn,REJECT
DOMAIN,game.weibo.cn,REJECT
DOMAIN,m.game.weibo.cn,REJECT
DOMAIN,promote.biz.weibo.cn,REJECT
DOMAIN-SUFFIX,g.uusee.com,REJECT
DOMAIN-SUFFIX,traffic.uusee.com,REJECT
DOMAIN-SUFFIX,pop.uusee.com,REJECT
DOMAIN-SUFFIX,static.g.ppstream.com,REJECT
DOMAIN-SUFFIX,dd.wenwo.com,REJECT
DOMAIN-SUFFIX,k.sinaimg.cn,REJECT
DOMAIN-SUFFIX,static.duoshuo.com,REJECT
DOMAIN-SUFFIX,static.bshare.cn,REJECT
DOMAIN-SUFFIX,jebe.renren.com,REJECT
DOMAIN,ebp.renren.com,REJECT
DOMAIN-SUFFIX,limneos.net,REJECT
DOMAIN,msg.71.am,REJECT
DOMAIN,msga.71.am,REJECT
DOMAIN-SUFFIX,cupid.iqiyi.com,REJECT
DOMAIN-SUFFIX,cupid.qiyi.com,REJECT
DOMAIN-SUFFIX,afp.qiyi.com,REJECT
DOMAIN-SUFFIX,ckm.iqiyi.com,REJECT
DOMAIN-SUFFIX,ad.m.iqiyi.com,REJECT
DOMAIN-SUFFIX,ifacelog.iqiyi.com,REJECT
DOMAIN-SUFFIX,rcd.iqiyi.com,REJECT
DOMAIN,msg.video.qiyi.com,REJECT
DOMAIN,msg2.video.qiyi.com,REJECT
DOMAIN,meta.video.qiyi.com,REJECT
DOMAIN,data.video.qiyi.com,REJECT
DOMAIN-SUFFIX,c.uaa.iqiyi.com,REJECT
DOMAIN-SUFFIX,cloudpush.iqiyi.com,REJECT
DOMAIN,cmts.iqiyi.com,REJECT
DOMAIN,data.store.iqiyi.com,REJECT
DOMAIN,feedback.iqiyi.com,REJECT
DOMAIN,mbdapp.iqiyi.com,REJECT
DOMAIN,mbdlog.iqiyi.com,REJECT
DOMAIN,msg.iqiyi.com,REJECT
DOMAIN,store.iqiyi.com,REJECT
DOMAIN,paopao.iqiyi.com,REJECT
DOMAIN-SUFFIX,afp.iqiyi.com,REJECT
DOMAIN-SUFFIX,api.cupid.iqiyi.com,REJECT
DOMAIN-SUFFIX,cm.passport.iqiyi.com,REJECT
DOMAIN-SUFFIX,ark.letv.com,REJECT
DOMAIN-SUFFIX,dc.letv.com,REJECT
DOMAIN-SUFFIX,n.mark.letv.com,REJECT
DOMAIN,g.q4ik.com,REJECT
DOMAIN,fz.letv.com,REJECT
DOMAIN,pro.letv.com,REJECT
DOMAIN,pro.hoye.letv.com,REJECT
DOMAIN,stat.letv.com,REJECT
DOMAIN,cdn.cxense.com,REJECT
DOMAIN,cm.mlt01.com,REJECT
DOMAIN,comcluster.cxense.com,REJECT
DOMAIN,www.cxense.com,REJECT
DOMAIN,afp.m1905.com,REJECT
DOMAIN,counter.m1905.com,REJECT
DOMAIN,vodlog.m1905.com,REJECT
DOMAIN,trace.m1905.cn,REJECT
DOMAIN,vodlog.m1905.cn,REJECT
DOMAIN-SUFFIX,de.as.pptv.com,REJECT
DOMAIN-SUFFIX,jp.as.pptv.com,REJECT
DOMAIN-SUFFIX,asimgs.pplive.cn,REJECT
DOMAIN,ads.data.pplive.com,REJECT
DOMAIN,afp.pplive.com,REJECT
DOMAIN,afv.pplive.com,REJECT
DOMAIN,caipiao.pplive.com,REJECT
DOMAIN,dh.pplive.com,REJECT
DOMAIN,g.pplive.com,REJECT
DOMAIN,ins-stat.pplive.com,REJECT
DOMAIN,ins-version.pplive.com,REJECT
DOMAIN,ins.pplive.com,REJECT
DOMAIN,live.v2.pplive.com,REJECT
DOMAIN,pp1.pplive.com,REJECT
DOMAIN,pp2.as.pplive.cn,REJECT
DOMAIN,up.pplive.com,REJECT
DOMAIN,as.aplus.pptv.com,REJECT
DOMAIN,dl4.vas.pptv.com,REJECT
DOMAIN,g.pptv.com,REJECT
DOMAIN,ga.pptv.com,REJECT
DOMAIN,iafp.pptv.com,REJECT
DOMAIN,pp2.pptv.com,REJECT
DOMAIN,ppsj.pptv.com,REJECT
DOMAIN,static.g.pptv.com,REJECT
DOMAIN,tips.passport.pptv.com,REJECT
DOMAIN,tj.g.pptv.com,REJECT
DOMAIN,vas.aplus.pptv.com,REJECT
DOMAIN,wstat.pptv.com,REJECT
DOMAIN,zt.pptv.com,REJECT
DOMAIN,h.g1d.net,REJECT
DOMAIN,p.g1d.net,REJECT
DOMAIN,ppva.g1d.net,REJECT
DOMAIN,video-va.g1d.net,REJECT
DOMAIN-SUFFIX,aty.sohu.com,REJECT
DOMAIN-SUFFIX,aty.tv.sohu.com,REJECT
DOMAIN-SUFFIX,atyt.tv.sohu.com,REJECT
DOMAIN-SUFFIX,pv.sohu.com,REJECT
DOMAIN-SUFFIX,goto.sms.sohu.com,REJECT
DOMAIN-SUFFIX,i.go.sohu.com,REJECT
DOMAIN-SUFFIX,s.go.sohu.com,REJECT
DOMAIN,count.vrs.sohu.com,REJECT
DOMAIN,dev.app.yule.sohu.com,REJECT
DOMAIN,game.m.sohu.com,REJECT
DOMAIN,stat.m.tv.sohu.com,REJECT
DOMAIN,upgrade.m.tv.sohu.com,REJECT
DOMAIN,click.hd.sohu.com.cn,REJECT
DOMAIN,click2.hd.sohu.com,REJECT
DOMAIN,mb.hd.sohu.com.cn,REJECT
DOMAIN,pb.hd.sohu.com.cn,REJECT
DOMAIN,pb.hd.sohu.com,REJECT
DOMAIN,pv.hd.sohu.com,REJECT
DOMAIN,ctr.hd.sohu.com,REJECT
DOMAIN,data.vod.itc.cn,REJECT
DOMAIN-SUFFIX,actives.youku.com,REJECT
DOMAIN-SUFFIX,ad.api.3g.youku.com,REJECT
DOMAIN-SUFFIX,atm.youku.com,REJECT
DOMAIN-SUFFIX,c.yes.youku.com,REJECT
DOMAIN-SUFFIX,lstat.youku.com,REJECT
DOMAIN-SUFFIX,lvip.youku.com,REJECT
DOMAIN-SUFFIX,p.l.youku.com,REJECT
DOMAIN-SUFFIX,r.l.youku.com,REJECT
DOMAIN-SUFFIX,stat.youku.com,REJECT
DOMAIN-SUFFIX,static.lstat.youku.com,REJECT
DOMAIN,api.gamex.mobile.youku.com,REJECT
DOMAIN,dl.m.youku.com,REJECT
DOMAIN,p-log.ykimg.com,REJECT
DOMAIN-SUFFIX,p.l.ykimg.com,REJECT
DOMAIN,passport-log.youku.com,REJECT
DOMAIN,push.m.youku.com,REJECT
DOMAIN,rec.api.gamex.mobile.youku.com,REJECT
DOMAIN,test.gamex.mobile.youku.com,REJECT
DOMAIN,vhtml.youku.com,REJECT
DOMAIN,cmstool.youku.com,REJECT
DOMAIN-SUFFIX,hudong.pl.youku.com,REJECT
DOMAIN-SUFFIX,ad.api.3g.tudou.com,REJECT
DOMAIN-SUFFIX,adcontrol.tudou.com,REJECT
DOMAIN-SUFFIX,adplay.tudou.com,REJECT
DOMAIN-SUFFIX,iwstat.tudou.com,REJECT
DOMAIN-SUFFIX,nstat.tudou.com,REJECT
DOMAIN-SUFFIX,stat.tudou.com,REJECT
DOMAIN-SUFFIX,stats.tudou.com,REJECT
DOMAIN-SUFFIX,goods.tudou.com,REJECT
DOMAIN,adextensioncontrol.tudou.com,REJECT
DOMAIN,erreport.tudou.com,REJECT
DOMAIN,istat.tudou.com,REJECT
DOMAIN,logs.live.tudou.com,REJECT
DOMAIN,pl.pb.ops.tudou.com,REJECT
DOMAIN,player.pb.ops.tudou.com,REJECT
DOMAIN,tdap.tudou.com,REJECT
DOMAIN,tdcm.tudou.com,REJECT
DOMAIN,tvp.tudou.com,REJECT
DOMAIN,union.tudou.com,REJECT
DOMAIN,wwwtest.tudou.com,REJECT
DOMAIN,tudouflv.dnion.com,REJECT
DOMAIN,acs.56.com,REJECT
DOMAIN,stat.v-56.com,REJECT
DOMAIN,msg.ua.56.com,REJECT
DOMAIN,acs.stat.v-56.com,REJECT
DOMAIN,mad.stat.v-56.com,REJECT
DOMAIN,so.stat.v-56.com,REJECT
DOMAIN,stat2.corp.v-56.com,REJECT
DOMAIN,stat2.stat.v-56.com,REJECT
DOMAIN,stat3.corp.v-56.com,REJECT
DOMAIN,stat3.stat.v-56.com,REJECT
DOMAIN,stat4.stat.v-56.com,REJECT
DOMAIN,t4u.stat.v-56.com,REJECT
DOMAIN-SUFFIX,logger.baofeng.com,REJECT
DOMAIN,clicklog.hd.baofeng.com,REJECT
DOMAIN,clicklog.moviebox.baofeng.com,REJECT
DOMAIN,dailylog.storm.baofeng.com,REJECT
DOMAIN,eventlog.hd.baofeng.com,REJECT
DOMAIN,gw.baofeng.com,REJECT
DOMAIN,listlog.baofeng.net,REJECT
DOMAIN,logger.treexml.baofeng.com,REJECT
DOMAIN,market.shouji.baofeng.com,REJECT
DOMAIN,midinfo.baofeng.com,REJECT
DOMAIN,sclog.moviebox.baofeng.com,REJECT
DOMAIN,vdinfo.baofeng.com,REJECT
DOMAIN,videodown.baofeng.com,REJECT
DOMAIN,boxlist.baofeng.net,REJECT
DOMAIN,clicklog.moviebox.baofeng.net,REJECT
DOMAIN,ploy.baofeng.net,REJECT
DOMAIN,pvlog.moviebox.baofeng.net,REJECT
DOMAIN-SUFFIX,houyi.baofeng.net,REJECT
DOMAIN,terren.cntv.cn,REJECT
DOMAIN,a.cctv.com,REJECT
DOMAIN,a.cntv.cn,REJECT
DOMAIN,ad.cctv.com,REJECT
DOMAIN,d.cntv.cn,REJECT
DOMAIN,log.vdn.apps.cntv.cn,REJECT
DOMAIN,adguanggao.eee114.com,REJECT
DOMAIN,cctv.adsunion.com,REJECT
DOMAIN,js.bmgad.com,REJECT
DOMAIN,med.soodao.com,REJECT
DOMAIN-SUFFIX,gug.ku6cdn.com,REJECT
DOMAIN-SUFFIX,pq.stat.ku6.com,REJECT
DOMAIN-SUFFIX,st.vq.ku6.cn,REJECT
DOMAIN-SUFFIX,static.ku6.com,REJECT
DOMAIN,adk.funshion.com,REJECT
DOMAIN,adm.funshion.com,REJECT
DOMAIN,game.funshion.com,REJECT
DOMAIN,jobsfe.funshion.com,REJECT
DOMAIN,neirong.funshion.com,REJECT
DOMAIN,partner.funshion.com,REJECT
DOMAIN,pub.funshion.com,REJECT
DOMAIN,shop.funshion.com,REJECT
DOMAIN,vas.funshion.com,REJECT
DOMAIN,stat.funshion.net,REJECT
DOMAIN,vasd.fun.tv,REJECT
DOMAIN,stats.kascend.com,REJECT
DOMAIN-SUFFIX,jzt.jd.com,REJECT
DOMAIN-SUFFIX,ccc.x.jd.com,REJECT
DOMAIN,ads.union.jd.com,REJECT
DOMAIN,u.x.jd.com,REJECT
DOMAIN,wn.x.jd.com,REJECT
DOMAIN,im-x.jd.com,REJECT
DOMAIN,cm.jd.com,REJECT
DOMAIN,union.m.jd.com,REJECT
DOMAIN,stat.m.jd.com,REJECT
DOMAIN-SUFFIX,n-st.vip.com,REJECT
DOMAIN-SUFFIX,ad.toutiao.com,REJECT
DOMAIN-SUFFIX,d.toutiao.com,REJECT
DOMAIN-SUFFIX,dm.toutiao.com,REJECT
DOMAIN-SUFFIX,dsp.toutiao.com,REJECT
DOMAIN-SUFFIX,nativeapp.toutiao.com,REJECT
DOMAIN-SUFFIX,partner.toutiao.com,REJECT
DOMAIN-SUFFIX,s3.bytecdn.cn,REJECT
DOMAIN,log.snssdk.com,REJECT
DOMAIN,open.snssdk.com,REJECT
DOMAIN,ic.snssdk.com,REJECT
DOMAIN,s.toutiao.com,REJECT
DOMAIN,pcd.autohome.com.cn,REJECT
DOMAIN,alog.umeng.com,REJECT
DOMAIN,ad.app.autohome.com.cn,REJECT
DOMAIN,adnewnc.app.autohome.com.cn,REJECT
DOMAIN,adm3.autoimg.cn,REJECT
DOMAIN,rd.autohome.com.cn,REJECT
DOMAIN,adm0.autoimg.cn,REJECT
DOMAIN,adm1.autoimg.cn,REJECT
DOMAIN,adm2.autoimg.cn,REJECT
DOMAIN,d0.xcar.com.cn,REJECT
DOMAIN,dw.xcar.com.cn,REJECT
DOMAIN,static.diditaxi.com.cn,REJECT
DOMAIN-SUFFIX,dotcounter.douyutv.com,REJECT
DOMAIN,pub.funshion.com,REJECT
DOMAIN,go.10086.cn,REJECT
DOMAIN-SUFFIX,a.koudai.com,REJECT
DOMAIN-SUFFIX,corp.meitu.com,REJECT
DOMAIN-SUFFIX,gg.meitu.com,REJECT
DOMAIN-SUFFIX,meitubeauty.meitudata.com,REJECT
DOMAIN-SUFFIX,message.meitu.com,REJECT
DOMAIN-SUFFIX,tuiguang.meitu.com,REJECT
DOMAIN-SUFFIX,xiuxiu.android.dl.meitu.com,REJECT
DOMAIN-SUFFIX,xiuxiu.mobile.meitudata.com,REJECT
DOMAIN-SUFFIX,adse.ximalaya.com,REJECT
DOMAIN-SUFFIX,ad.test.ximalaya.com,REJECT
DOMAIN-SUFFIX,ad.ximalaya.com,REJECT
DOMAIN-SUFFIX,adse.test.ximalaya.com,REJECT
DOMAIN-SUFFIX,adweb.test.ximalaya.com,REJECT
DOMAIN-SUFFIX,adweb.ximalaya.com,REJECT
DOMAIN-SUFFIX,linkeye.ximalaya.com,REJECT
DOMAIN-SUFFIX,location.ximalaya.com,REJECT
DOMAIN-SUFFIX,xdcs-collector.ximalaya.com,REJECT
DOMAIN,g.kuwo.cn,REJECT
DOMAIN,log.kuwo.cn,REJECT
DOMAIN,updatepage.kuwo.cn,REJECT
DOMAIN,wa.kuwo.cn,REJECT
DOMAIN,webstat.kuwo.cn,REJECT
DOMAIN,g.koowo.com,REJECT
DOMAIN,wa.koowo.com,REJECT
DOMAIN,downmini.kugou.com,REJECT
DOMAIN,downmobile.kugou.com,REJECT
DOMAIN,logstat.kugou.com,REJECT
DOMAIN,opt.kugou.com,REJECT
DOMAIN,softstart.kugou.com,REJECT
DOMAIN,tj.kugou.com,REJECT
DOMAIN-SUFFIX,ads.service.kugou.com,REJECT
DOMAIN-SUFFIX,d.kugou.com,REJECT
DOMAIN-SUFFIX,downmobile.kugou.com,REJECT
DOMAIN-SUFFIX,fanxing.kugou.com,REJECT
DOMAIN-SUFFIX,gad.kugou.com,REJECT
DOMAIN-SUFFIX,game.kugou.com,REJECT
DOMAIN-SUFFIX,gcapi.sy.kugou.com,REJECT
DOMAIN-SUFFIX,gg.kugou.com,REJECT
DOMAIN-SUFFIX,install.kugou.com,REJECT
DOMAIN-SUFFIX,install2.kugou.com,REJECT
DOMAIN-SUFFIX,kgmobilestat.kugou.com,REJECT
DOMAIN-SUFFIX,kuaikaiapp.com,REJECT
DOMAIN-SUFFIX,log.stat.kugou.com,REJECT
DOMAIN-SUFFIX,minidcsc.kugou.com,REJECT
DOMAIN-SUFFIX,mo.kugou.com,REJECT
DOMAIN-SUFFIX,mobilelog.kugou.com,REJECT
DOMAIN-SUFFIX,msg.mobile.kugou.com,REJECT
DOMAIN-SUFFIX,mvads.kugou.com,REJECT
DOMAIN-SUFFIX,p.kugou.com,REJECT
DOMAIN-SUFFIX,push.mobile.kugou.com,REJECT
DOMAIN-SUFFIX,rtmonitor.kugou.com,REJECT
DOMAIN-SUFFIX,sdn.kugou.com,REJECT
DOMAIN-SUFFIX,update.mobile.kugou.com,REJECT
DOMAIN-SUFFIX,games.ifeng.com,REJECT
DOMAIN-SUFFIX,ifashion.ifeng.com,REJECT
DOMAIN,api.newad.ifeng.com,REJECT
DOMAIN,bc.ifeng.com,REJECT
DOMAIN,dol.deliver.ifeng.com,REJECT
DOMAIN,dol.ifeng.com,REJECT
DOMAIN,dolphin.deliver.ifeng.com,REJECT
DOMAIN,g.ifeng.com,REJECT
DOMAIN,iis1.deliver.ifeng.com,REJECT
DOMAIN,mfp.deliver.ifeng.com,REJECT
DOMAIN,online.3g.ifeng.com,REJECT
DOMAIN,sta.ifeng.com,REJECT
DOMAIN,sta.play.ifeng.com,REJECT
DOMAIN,stadig.ifeng.com,REJECT
DOMAIN,survey.news.ifeng.com,REJECT
DOMAIN,yes1.feng.com,REJECT
DOMAIN,duiba.com.cn,REJECT
DOMAIN,dui88.com,REJECT
DOMAIN-SUFFIX,da.hunantv.com,REJECT
DOMAIN-SUFFIX,log.v2.hunantv.com,REJECT
DOMAIN-SUFFIX,v2.log.hunantv.com,REJECT
DOMAIN,mobile.log.hunantv.com,REJECT
DOMAIN,mp4.res.hunantv.com,REJECT
DOMAIN,click.hunantv.com,REJECT
DOMAIN,corp.hunantv.com,REJECT
DOMAIN,flv.res.hunantv.com,REJECT
DOMAIN,log.hunantv.com,REJECT
DOMAIN,mobile.log.hunantv.com,REJECT
DOMAIN,stat.titan.imgo.tv,REJECT
DOMAIN,click.hifly.tv,REJECT
DOMAIN,recv-vd.gridsumdissector.cn,REJECT
DOMAIN,recv-vd.gridsumdissector.com,REJECT
DOMAIN,geo.gridsumdissector.com,REJECT
DOMAIN,ad.yy.duowan.com,REJECT
DOMAIN,forceupdate.yy.duowan.com,REJECT
DOMAIN,gamecollaborate.yy.duowan.com,REJECT
DOMAIN,hkmoblbssdk.yy.duowan.com,REJECT
DOMAIN,market.duowan.com,REJECT
DOMAIN,moblbssdk.yy.duowan.com,REJECT
DOMAIN,mstat.duowan.com,REJECT
DOMAIN,wtmoblbssdk.yy.duowan.com,REJECT
DOMAIN,pflq.duowan.com,REJECT
DOMAIN,ka.duowan.com,REJECT
DOMAIN,gm_download3.yy.com,REJECT
DOMAIN,policyres.game.yy.com,REJECT
DOMAIN,stat2.web.yy.com,REJECT
DOMAIN,yymobilegame.game.yy.com,REJECT
DOMAIN,dw.hiido.cn,REJECT
DOMAIN,im.yy.hiido.cn,REJECT
DOMAIN,njs.dw.hiido.cn,REJECT
DOMAIN,mb.hiido.com,REJECT
DOMAIN,mlog.hiido.com,REJECT
DOMAIN,config.hiido.com,REJECT
DOMAIN,tlog.hiido.com,REJECT
DOMAIN,trans.hiido.com,REJECT
DOMAIN,ylog.hiido.com,REJECT
DOMAIN,push.zhangyue.com,REJECT
DOMAIN,ad.12306.cn,REJECT
DOMAIN,sm.domobcdn.com,REJECT
DOMAIN,erebor.douban.com,REJECT
DOMAIN,ads.ookla.com,REJECT
DOMAIN,cdn.ads.ookla.com,REJECT
DOMAIN,acsystem.wasu.cn,REJECT
DOMAIN,www.gridsum.com,REJECT
DOMAIN,g.gridsum.com,REJECT
DOMAIN,recv-wd.gridsumdissector.com,REJECT
DOMAIN,static.gridsumdissector.com,REJECT
DOMAIN,bj.imp.voiceads.cn,REJECT
DOMAIN-SUFFIX,ht55.cn,REJECT
DOMAIN-SUFFIX,3600.com,REJECT
DOMAIN-SUFFIX,dev.tg.wan.360.cn,REJECT
DOMAIN-SUFFIX,f.360.cn,REJECT
DOMAIN-SUFFIX,leak.360.cn,REJECT
DOMAIN-SUFFIX,openbox.mobilem.360.cn,REJECT
DOMAIN-SUFFIX,pub.se.360.cn,REJECT
DOMAIN-SUFFIX,soft.data.weather.360.cn,REJECT
DOMAIN-SUFFIX,stat.360safe.com,REJECT
DOMAIN-SUFFIX,stat.m.360.cn,REJECT
DOMAIN-SUFFIX,lianmeng.360.cn,REJECT
DOMAIN-SUFFIX,update.360safe.com,REJECT
DOMAIN-SUFFIX,kuaikan.netmon.360safe.com,REJECT
DOMAIN,dl.360safe.com,REJECT
DOMAIN,inst.360safe.com,REJECT
DOMAIN,ad.dev.360.cn,REJECT
DOMAIN,ad.gamebox.360.cn,REJECT
DOMAIN,down.360.cn,REJECT
DOMAIN,guess.tf.360.cn,REJECT
DOMAIN,stats.guess.tf.360.cn,REJECT
DOMAIN,tf.360.cn,REJECT
DOMAIN,v.tf.360.cn,REJECT
DOMAIN,s.360.cn,REJECT
DOMAIN,s.mall.360.cn,REJECT
DOMAIN,fd.shouji.360.cn,REJECT
DOMAIN,feedback.m.360.cn,REJECT
DOMAIN,msg.shouji.360.cn,REJECT
DOMAIN,guess.h.qhimg.com,REJECT
DOMAIN,haostat.qihoo.com,REJECT
DOMAIN,hot.m.shouji.360tpcdn.com,REJECT
DOMAIN,corn.yumimobi.com,REJECT
DOMAIN,stat.adx.yumimobi.com,REJECT
DOMAIN-SUFFIX,heyzap.com,REJECT
DOMAIN-SUFFIX,voiceads.cn,REJECT
DOMAIN-SUFFIX,zplay.cn,REJECT
DOMAIN-SUFFIX,fengbuy.com,REJECT
DOMAIN-SUFFIX,tutuapp.com,REJECT
DOMAIN-SUFFIX,we.tm,REJECT
DOMAIN-SUFFIX,aoodoo.feng.com,REJECT
DOMAIN-SUFFIX,bbsanalytics.weiphone.net,REJECT
DOMAIN-SUFFIX,yes1.feng.com,REJECT
DOMAIN-SUFFIX,adm.myzaker.com,REJECT
DOMAIN-SUFFIX,api.myzaker.com,REJECT
DOMAIN-SUFFIX,ggs.myzaker.com,REJECT
DOMAIN-SUFFIX,801.tianya.cn,REJECT
DOMAIN-SUFFIX,803.tianya.cn,REJECT
DOMAIN-SUFFIX,806.tianya.cn,REJECT
DOMAIN-SUFFIX,807.tianya.cn,REJECT
DOMAIN-SUFFIX,808.tianya.cn,REJECT
DOMAIN-SUFFIX,bdj.tianya.cn,REJECT
DOMAIN,dol.tianya.cn,REJECT
DOMAIN,advertisement.tianya.cn,REJECT
DOMAIN,adview.tianya.cn,REJECT
DOMAIN,squidclick.bbs.tianya.cn,REJECT
DOMAIN,stat.tianya.cn,REJECT
DOMAIN,urchin.tianya.cn,REJECT
DOMAIN,801.tianyaui.com,REJECT
DOMAIN,click.tianyaui.com,REJECT
DOMAIN-SUFFIX,123.sogou.com,REJECT
DOMAIN-SUFFIX,brand.sogou.com,REJECT
DOMAIN-SUFFIX,img.wan.sogou.com,REJECT
DOMAIN-SUFFIX,inte.sogou.com,REJECT
DOMAIN,sfsapi.micloud.xiaomi.net,REJECT
DOMAIN-SUFFIX,ad.xiaomi.com,REJECT
DOMAIN-SUFFIX,market.xiaomi.com,REJECT
DOMAIN-SUFFIX,bjdnserror1.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror2.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror3.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror4.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror5.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror6.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror7.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror8.wo.com.cn,REJECT
DOMAIN-SUFFIX,bjdnserror9.wo.com.cn,REJECT
DOMAIN-SUFFIX,c.bxb.oupeng.com,REJECT
DOMAIN-SUFFIX,h04.hxsame.hexun.com,REJECT
DOMAIN-SUFFIX,hxsame.hexun.com,REJECT
DOMAIN-SUFFIX,itv.hexun.com,REJECT
DOMAIN-SUFFIX,so.hexun.com,REJECT
DOMAIN,epay.keepc.com,REJECT
DOMAIN,api.mopay.com,REJECT
DOMAIN,mobile.yeepay.com,REJECT
DOMAIN,payload.moji002.com,REJECT
DOMAIN,mobilepay.unionpaysecure.com,REJECT
DOMAIN,payment.umpay.com,REJECT
DOMAIN,sdk.baopay.com,REJECT
DOMAIN,ipay.appchina.com,REJECT
DOMAIN,agency.91.com,REJECT
DOMAIN,appupdate.sj.91.com,REJECT
DOMAIN,bbxdata.sj.91.com,REJECT
DOMAIN,d.91.com,REJECT
DOMAIN,djoy-dev.91.com,REJECT
DOMAIN,djoy.91test.com,REJECT
DOMAIN,dl.sj.91.com,REJECT
DOMAIN,g2.v3.91.com,REJECT
DOMAIN,image.agency.91.com,REJECT
DOMAIN,mjoy.91.com,REJECT
DOMAIN,mpush-phone.91.com,REJECT
DOMAIN,urlservice.sj.91.com,REJECT
DOMAIN,mobiledata-dev.91.com,REJECT
DOMAIN,v2.g2.91.com,REJECT
DOMAIN,mobiledata-dev2.91.com,REJECT
DOMAIN,adpush.91smart.net,REJECT
DOMAIN,api.adcome.cn,REJECT
DOMAIN,music.adcome.cn,REJECT
DOMAIN,res.adcome.cn,REJECT
DOMAIN,ad.camera360.us,REJECT
DOMAIN,applog.camera360.com,REJECT
DOMAIN,feedback.camera360.com,REJECT
DOMAIN,pushmsg.camera360.com,REJECT
DOMAIN,update.camera360.com,REJECT
DOMAIN,pub.mop.com,REJECT
DOMAIN,gou.mop.com,REJECT
DOMAIN,dc.mop.com,REJECT
DOMAIN,imgpub.mop.com,REJECT
DOMAIN,trackx.mop.com,REJECT
DOMAIN,crm.ws.ctrip.com,REJECT
DOMAIN,s.c-ctrip.com,REJECT
DOMAIN,a.dolphin-browser.com,REJECT
DOMAIN,activation.dolphin-browser.com,REJECT
DOMAIN,download.dolphin-browser.cn,REJECT
DOMAIN,survey.dolphin.com,REJECT
DOMAIN-SUFFIX,ad.ganji.com,REJECT
DOMAIN-SUFFIX,analytics.ganji.com,REJECT
DOMAIN-SUFFIX,click.ganji.com,REJECT
DOMAIN-SUFFIX,ganjituiguang.ganji.com,REJECT
DOMAIN-SUFFIX,sta.ganji.com,REJECT
DOMAIN-SUFFIX,tralog.ganji.com,REJECT
DOMAIN,msg.xageek.com,REJECT
DOMAIN,stat.xageek.com,REJECT
DOMAIN,appstore.51y5.net,REJECT
DOMAIN,static.activity.51y5.net,REJECT
DOMAIN,api.o2o.lianwifi.com,REJECT
DOMAIN,dl01.lianwifi.com,REJECT
DOMAIN,gamecenter.lianwifi.com,REJECT
DOMAIN,gmdh.lianwifi.com,REJECT
DOMAIN,gmpt.lianwifi.com,REJECT
DOMAIN,gmtj.lianwifi.com,REJECT
DOMAIN,static.game.lianwifi.com,REJECT
DOMAIN,static.o2o.lianwifi.com,REJECT
DOMAIN,wifiapi01.51y5.net,REJECT
DOMAIN,wifiapi02.51y5.net,REJECT
DOMAIN-SUFFIX,c.51y5.net,REJECT
DOMAIN-SUFFIX,cds.51y5.net,REJECT
DOMAIN-SUFFIX,ios-dc.51y5.net,REJECT
DOMAIN-SUFFIX,news-img.51y5.net,REJECT
DOMAIN-SUFFIX,wkanc.com,REJECT
DOMAIN,game.uxin.com,REJECT
DOMAIN,cal.report2.zdworks.com,REJECT
DOMAIN,cal.stat.zdworks.com,REJECT
DOMAIN,cal.stat2.zdworks.com,REJECT
DOMAIN,cali.stat.zdworks.com,REJECT
DOMAIN,cali.stat2.zdworks.com,REJECT
DOMAIN,clock.report2.zdworks.com,REJECT
DOMAIN,clock.stat.zdworks.com,REJECT
DOMAIN,clock.stat2.zdworks.com,REJECT
DOMAIN,clock.update.zdworks.com,REJECT
DOMAIN,clockupdate.zdworks.com,REJECT
DOMAIN,cuckoo.zdworks.com,REJECT
DOMAIN,static.cuckoo.zdworks.com,REJECT
DOMAIN,zpns.zdworks.com,REJECT
DOMAIN,zrs.stat.zdworks.com,REJECT
DOMAIN,zrs.zdworks.com,REJECT
DOMAIN-SUFFIX,analytics-union.xunlei.com,REJECT
DOMAIN-SUFFIX,union.xunlei.com,REJECT
DOMAIN,advstat.xunlei.com,REJECT
DOMAIN,client.stat.xunlei.com,REJECT
DOMAIN,cop.my.xunlei.com,REJECT
DOMAIN,hezuo.down.xunlei.com,REJECT
DOMAIN,jsunion.kankan.xunlei.com,REJECT
DOMAIN,kkpgv.xunlei.com,REJECT
DOMAIN,kkpgv2.xunlei.com,REJECT
DOMAIN,leiyanstatic.xunlei.com,REJECT
DOMAIN,mediapv.xunlei.com,REJECT
DOMAIN,p4pstatic.xunlei.com,REJECT
DOMAIN,jump.niu.xunlei.com,REJECT
DOMAIN,pgv.m.xunlei.com,REJECT
DOMAIN,pgv2.m.xunlei.com,REJECT
DOMAIN,pv.kankan.stat.xunlei.com,REJECT
DOMAIN,recommend.xunlei.com,REJECT
DOMAIN,record.kuai.xunlei.com,REJECT
DOMAIN,stat.download.xunlei.com,REJECT
DOMAIN,stat.xunlei.com,REJECT
DOMAIN,static.soft.xunlei.com,REJECT
DOMAIN,statis.kankan.xunlei.com,REJECT
DOMAIN,statxml.gamedata.xunlei.com,REJECT
DOMAIN,tj.xunlei.com,REJECT
DOMAIN,tracker.movie.xunlei.com,REJECT
DOMAIN,web.stat.xunlei.com,REJECT
DOMAIN,websts.xunlei.com,REJECT
DOMAIN,wp.stat.xunlei.com,REJECT
DOMAIN,wy.xunlei.com,REJECT
DOMAIN,xmlconf.client.xunlei.com,REJECT
DOMAIN,liveupdate.mac.sandai.net,REJECT
DOMAIN-SUFFIX,biz5.kankan.com,REJECT
DOMAIN-SUFFIX,float.kankan.com,REJECT
DOMAIN-SUFFIX,cm.kankan.com,REJECT
DOMAIN,kkpgv.kankan.com,REJECT
DOMAIN,kkpgv2.kankan.com,REJECT
DOMAIN,kkpgv2.xunlei.com,REJECT
DOMAIN,material.ssp.xunlei.com,REJECT
DOMAIN-SUFFIX,ad.duomi.com,REJECT
DOMAIN-SUFFIX,boxshows.com,REJECT
DOMAIN-SUFFIX,click1n.soufun.com,REJECT
DOMAIN-SUFFIX,clickm.fang.com,REJECT
DOMAIN-SUFFIX,clickn.fang.com,REJECT
DOMAIN-SUFFIX,countpvn.light.fang.com,REJECT
DOMAIN-SUFFIX,countubn.light.soufun.com,REJECT
DOMAIN-SUFFIX,mshow.fang.com,REJECT
DOMAIN-SUFFIX,tongji.home.soufun.com,REJECT
DOMAIN-SUFFIX,app-monitor.ele.me,REJECT
DOMAIN-SUFFIX,client-api.ele.me,REJECT
DOMAIN-SUFFIX,grand.ele.me,REJECT
DOMAIN-SUFFIX,mobile-pubt.ele.me,REJECT
DOMAIN-SUFFIX,newton-api.ele.me,REJECT
DOMAIN-SUFFIX,ad.api.moji.com,REJECT
DOMAIN-SUFFIX,app.moji001.com,REJECT
DOMAIN-SUFFIX,cdn.moji.com,REJECT
DOMAIN-SUFFIX,cdn.moji002.com,REJECT
DOMAIN-SUFFIX,cdn2.moji002.com,REJECT
DOMAIN-SUFFIX,fds.api.moji.com,REJECT
DOMAIN-SUFFIX,log.moji.com,REJECT
DOMAIN-SUFFIX,stat.moji.com,REJECT
DOMAIN-SUFFIX,ugc.moji001.com,REJECT
DOMAIN-SUFFIX,ad.qingting.fm,REJECT
DOMAIN-SUFFIX,admgr.qingting.fm,REJECT
DOMAIN-SUFFIX,dload.qd.qingting.fm,REJECT
DOMAIN-SUFFIX,logger.qingting.fm,REJECT
DOMAIN-SUFFIX,s.qd.qingting.fm,REJECT
DOMAIN-SUFFIX,s.qd.qingtingfm.com,REJECT
DOMAIN-SUFFIX,92x.tumblr.com,REJECT
DOMAIN-SUFFIX,its-dori.tumblr.com,REJECT
DOMAIN-SUFFIX,tumblrprobes.cedexis.com,REJECT
DOMAIN-SUFFIX,tumblrreports.cedexis.com,REJECT
DOMAIN-SUFFIX,sugar.zhihu.com,REJECT
DOMAIN-SUFFIX,zhihu-analytics.zhihu.com,REJECT
DOMAIN-SUFFIX,zhihu-web-analytics.zhihu.com,REJECT
DOMAIN-SUFFIX,zhstatic.zhihu.com,REJECT
DOMAIN,clickhz.meizu.com,REJECT
DOMAIN,tongji.meizu.com,REJECT

# PROXY
PROCESS-NAME,Twitter,PROXY
DOMAIN-KEYWORD,twitter,PROXY,force-remote-dns

# IQIYI
IP-CIDR,112.13.64.0/22,REJECT,no-resolve
IP-CIDR,112.253.36.0/24,REJECT,no-resolve
IP-CIDR,117.139.16.0/22,REJECT,no-resolve
IP-CIDR,117.139.18.132/22,REJECT,no-resolve
IP-CIDR,119.188.172.192/28,REJECT,no-resolve
IP-CIDR,119.188.173.0/27,REJECT,no-resolve
IP-CIDR,119.188.43.61/32,REJECT,no-resolve
IP-CIDR,123.130.122.128/28,REJECT,no-resolve
IP-CIDR,157.122.96.23/32,REJECT,no-resolve
IP-CIDR,183.221.244.0/22,REJECT,no-resolve
IP-CIDR,183.221.247.189/22,REJECT,no-resolve
IP-CIDR,27.221.89.128/28,REJECT,no-resolve
IP-CIDR,60.211.171.128/29,REJECT,no-resolve
IP-CIDR,60.211.211.1/32,REJECT,no-resolve

# YOUKU
IP-CIDR,117.177.248.17/32,REJECT,no-resolve
IP-CIDR,117.177.248.41/32,REJECT,no-resolve
IP-CIDR,223.87.176.139/32,REJECT,no-resolve
IP-CIDR,223.87.176.176/32,REJECT,no-resolve
IP-CIDR,223.87.177.180/32,REJECT,no-resolve
IP-CIDR,223.87.177.182/32,REJECT,no-resolve
IP-CIDR,223.87.177.184/32,REJECT,no-resolve
IP-CIDR,223.87.177.43/32,REJECT,no-resolve
IP-CIDR,223.87.177.47/32,REJECT,no-resolve
IP-CIDR,223.87.177.80/32,REJECT,no-resolve
IP-CIDR,223.87.182.101/32,REJECT,no-resolve
IP-CIDR,223.87.182.102/32,REJECT,no-resolve
IP-CIDR,223.87.182.11/32,REJECT,no-resolve
IP-CIDR,223.87.182.52/32,REJECT,no-resolve


IP-CIDR,60.210.17.12/24,REJECT,no-resolve
IP-CIDR,123.125.117.0/22,REJECT,no-resolve

# Beijing Mobile Float
IP-CIDR,221.179.140.0/24,REJECT,no-resolve
IP-CIDR,221.179.140.145/32,REJECT,no-resolve
IP-CIDR,114.247.28.96/32,REJECT,no-resolve
# ShangHai Unicom Float
IP-CIDR,220.196.52.141/32,REJECT,no-resolve
# Jiangsu Telecom Float
IP-CIDR,221.228.17.152/32,REJECT,no-resolve
# WuHan Telecom Float
IP-CIDR,111.175.220.160/29,REJECT,no-resolve
# Wuhan Unicom Float
IP-CIDR,113.57.230.88/32,REJECT,no-resolve
# HangZhou Unicom Float
IP-CIDR,124.160.194.11/32,REJECT,no-resolve
# HangZhou Telecom Float
IP-CIDR,61.160.200.252/32,REJECT,no-resolve

IP-CIDR,101.251.211.235/32,REJECT,no-resolve
IP-CIDR,111.40.201.235/32,REJECT,no-resolve
IP-CIDR,117.131.134.19/32,REJECT,no-resolve
IP-CIDR,120.52.72.36/24,REJECT,no-resolve

# Telegram
IP-CIDR,101.227.14.0/24,REJECT,no-resolve
IP-CIDR,101.227.12.0/24,REJECT,no-resolve
IP-CIDR,111.63.135.146/32,REJECT,no-resolve
IP-CIDR,111.206.22.0/24,REJECT,no-resolve
IP-CIDR,121.251.255.237/32,REJECT,no-resolve
IP-CIDR,123.125.117.0/24,REJECT,no-resolve
IP-CIDR,123.125.118.0/24,REJECT,no-resolve

IP-CIDR,192.168.0.0/16,DIRECT
IP-CIDR,10.0.0.0/8,DIRECT
IP-CIDR,172.16.0.0/12,DIRECT
IP-CIDR,127.0.0.0/8,DIRECT

FINAL,DIRECT

[URL Rewrite]
// Google_Service_HTTPS_Jump
^https?://(www.)?g.cn https://www.google.com 302
^https?://(www.)?google.cn https://www.google.com 302

// Anti_ISP_JD_Hijack
^https?://coupon.m.jd.com/ https://coupon.m.jd.com/ 302
^https?://h5.m.jd.com/ https://h5.m.jd.com/ 302
^https?://item.m.jd.com/ https://item.m.jd.com/ 302
^https?://m.jd.com https://m.jd.com 302
^https?://newcz.m.jd.com/ https://newcz.m.jd.com/ 302
^https?://p.m.jd.com/ https://p.m.jd.com/ 302
^https?://so.m.jd.com/ https://so.m.jd.com/ 302
^https?://union.click.jd.com/jda? http://union.click.jd.com/jda?adblock= header
^https?://union.click.jd.com/sem.php? http://union.click.jd.com/sem.php?adblock= header
^https?://www.jd.com/ https://www.jd.com/ 302

// Anti_ISP_Taobao_Hijack
^https?://m.taobao.com/ https://m.taobao.com/ 302

// Anti_ISP_JavaScript_Injection
^https?://101.251.211.235 - reject
^https?://103.249.254.113 - reject
^https?://106.75.65.92 - reject
^https?://120.132.57.41 - reject
^https?://120.132.63.203 - reject
^https?://120.26.151.246 - reject
^https?://120.55.199.139 - reject
^https?://120.76.189.132 - reject
^https?://122.226.223.163 - reject
^https?://139.196.239.52 - reject
^https?://180.76.155.58 - reject
^https?://183.131.79.30 - reject
^https?://211.155.94.198 - reject
^https?://223.6.255.99 - reject
^https?://c.minisplat.cn/ - reject
^https?://c1.minisplat.cn/ - reject
^https?://cache.changjingyi.cn/ - reject
^https?://cache.gclick.cn/ - reject

// Anti_ISP_Safari_Baidu_CPM_Hijack
^https?://m.coolaiy.com/b.php - reject
^https?://www.babyye.com/b.php - reject
^https?://www.gwv7.com/b.php - reject
^https?://www.likeji.net/b.php - reject
// Feng
^https?://push.feng.com/resource/photo/appimg/launchimage - reject
^https?://yes1.feng.com/images http://ogtre5vp0.bkt.clouddn.com/background.png? header
^https?://yes1.feng.com/view.php http://ogtre5vp0.bkt.clouddn.com/background.png? header

// Tencent
^https?://imgcache.qq.com/qqlive/ - reject
^https?://mi.gdt.qq.com\/gdt_mview.fcg\?posid= - reject
^https?://mp.weixin.qq.com/mp/report - reject
^https?://news.l.qq.com\/app\? - reject
^https?://r.inews.qq.com/adsBlacklist - reject
^https?://r.inews.qq.com/getBannerAds - reject
^https?://r.inews.qq.com/getFullScreenPic - reject
^https?://r.inews.qq.com/getNewsRemoteConfig - reject
^https?://r.inews.qq.com/getSplash\?apptype=ios\&startarticleid=\&__qnr= - reject
^https?://r.inews.qq.com/searchHotCatList - reject
^https?://r.inews.qq.com/upLoadLoc - reject

// Moji
^https?://ad.api.moji.com/ad/log/stat - reject
^https?://ast.api.moji.com/assist/ad/moji/stat - reject
^https?://cdn.moji.com/adlink/avatarcard - reject
^https?://cdn.moji.com/adlink/common - reject
^https?://cdn.moji.com/adlink/splash/ - reject
^https?://cdn.moji.com/advert/ - reject
^https?://cdn2.moji002.com/webpush/ad2/ - reject
^https?://fds.api.moji.com/card/recommend - reject
^https?://show.api.moji.com/json/showcase/getAll - reject
^https?://stat.moji.com - reject
^https?://storage.360buyimg.com/kepler-app - reject
^https?://ugc.moji001.com/sns/json/profile/get_unread - reject

// Youku
^https?://(\d{1,3}\.){1,3}\d{1,3}.+duration=\d{2} - reject
^https?://ad.api.3g.youku.com - reject
^https?://api.appsdk.soku.com/bg/r - reject
^https?://api.appsdk.soku.com/tag/r - reject
^https?://api.k.sohu.com/api/channel/ad/ - reject
^https?://api.mobile.youku.com/adv/ - reject
^https?://api.mobile.youku.com/layout/search/hot/word - reject
^https?://hd.api.mobile.youku.com/common/v3/hudong/new - reject
^https?://hd.mobile.youku.com/common/v3/hudong/new - reject
^https?://i.gtimg.cn/ https://i.gtimg.cn/ 302
^https?://k.youku.com/player/getFlvPath/ - reject
^https?://m.youku.com/video/libs/iwt.js - reject
^https?://pic.k.sohu.com/img8/wb/tj/ - reject
^https?://r.l.youku.com/rec_at_click - reject
^https?://r1.ykimg.com/\w{30,35}.jpg - reject
^https?://r1.ykimg.com/material/.+/\d{3,4}-\d{4} - reject
^https?://r1.ykimg.com/material/.+/\d{6}/\d{4}/ - reject


// ZhuiShu
^https?://api.zhuishushenqi.com/advert - reject
^https?://api.zhuishushenqi.com/notification/shelfMessage - reject
^https?://api.zhuishushenqi.com/recommend - reject
^https?://api.zhuishushenqi.com/splashes/ios - reject
^https?://mi.gdt.qq.com/gdt_mview.fcg - reject

// IQIYI
^https?://.+/cdn/qiyiapp/\d{8}/.+&dis_dz= - reject
^https?://.+/cdn/qiyiapp/\d{8}/.+&z=\w - reject
^https?://iface2?.iqiyi.com/api/getNewAdInfo - reject
^https?://iface2?.iqiyi.com/control/3.0/ - reject
^https?://iface2?.iqiyi.com/fusion/3.0/ - reject
^https?://iface2?.iqiyi.com/views_pop/ - reject
// ChinaRailcom
^https?://211.98.70.226:8080/ - reject
^https?://211.98.71.195:8080/ - reject
^https?://211.98.71.196:8080/ - reject

// Sohu
^https?://agn.aty.sohu.com/m? - reject
^https?://api.tv.sohu.com/mobile/control/switch.json? - reject
^https?://api.tv.sohu.com/mobile_user/device/clientconf.json? - reject
^https?://api.tv.sohu.com/mobile_user/push/uploadtoken.json? - reject
^https?://api.tv.sohu.com/v4/mobile/albumdetail.json? - reject
^https?://api.tv.sohu.com/v4/mobile/albumdetail.json\?poid= - reject
^https?://api.tv.sohu.com/v4/mobile/control/switch.json? - reject
^https?://hui.sohu.com/predownload2/? - reject
^https?://m.aty.sohu.com/openload? - reject
^https?://mbl.56.com/config/v1/common/config.union.ios.do? - reject
^https?://mmg.aty.sohu.com/mqs? - reject
^https?://mmg.aty.sohu.com/pvlog? - reject
^https?://photocdn.sohu.com/tvmobilemvms - reject
^https?://s.go.sohu.com\/adgtr\/\?gbcode=\&appchn= - reject
^https?://s1.api.tv.itc.cn/v4/mobile/feeling/list.json? - reject
^https?://s1.api.tv.itc.cn/v4/mobile/searchFunctionConfig/list.json? - reject

// Zhihu
^https?://api.zhihu.com/carousel? - reject
^https?://api.zhihu.com/.+&size=1242%2A2208 - reject
^https?://pic2.zhimg.com/.+370x100 - reject
^https?://www.zhihu.com/api/v4/banners/mobile_banner - reject
^https?://www.zhihu.com/api/v4/banners/mobile_question_cpd - reject
^https?://www.zhihu.com/node/Banner? - reject

// Baidu
(ps|sv|offnavi|newvector|ulog\.imap|newloc)(\.map)?\.(baidu|n\.shifen)\.com - reject
^https?://afd.baidu.com/afd/entry - reject
^https?://als.baidu.com/clog/clog - reject
^https?://baichuan.baidu.com/rs/adpmobile/launch - reject
^https?://bj.bcebos.com/fc-feed/0/pic/ - reject
^https?://c.tieba.baidu.com/c/p/img\?src= - reject
^https?://c.tieba.baidu.com/c/s/logtogether\?cmd= - reject
^https?://gss0.bdstatic.com/.+/static/wiseindex/img/bd_red_packet.png - reject
^https?://imgsrc.baidu.com\/forum\/pic\/item/ - reject
^https?://sm.domobcdn.com/ugc/\w/ - reject
^https?://tb1.bdstatic.com/tb/cms/ngmis/adsense/*.jpg - reject
^https?://tb2.bdstatic.com/tb/mobile/spb/widget/jump - reject

// Baidu Wenku
^https?://wapwenku.baidu.com/view/fengchao/ - reject
^https?://wapwenku.baidu.com/view/fengchaoTwojump/ - reject
^https?://wenku.baidu.com/shifen/ - reject

// 360
(.+\.|^)(360|so|qihoo|360safe|360totalsecurity|yunpan)\.(cn|com) - reject

// 10086
^.+/gmccapp/file/image/preloading/preloading\d{17}.jpg - reject
^https?://\w{2}.10086.cn/upfile/khd/loadingpage/.+ reject
^https?://app.10086.cn/group - reject

// 10000
^https?://image1.chinatelecom-ec.com/images/.+/\d{13}.jpg - reject

// 10010
^https://\w{11,12}.wo.com.cn - reject
^https?://m.client.10010.com/mobileService/activity/get_client_adv - reject
^https?://m.client.10010.com/mobileService/activity/get_startadv - reject
^https?://res.mall.10010.cn/mall/common/js/fa.js?referer= - reject

// Ifeng
^https?://api.newad.ifeng.com/ClientAdversApi1508\?adids= - reject
^https?://exp.3g.ifeng.com/coverAdversApi\?gv=. - reject
^https?://ifengad.3g.ifeng.com/ad/pv.php\?stat= - reject
^https?://iis1.deliver.ifeng.com/getmcode\?adid= - reject

// 163
^https?://mimg.127.net/external/smartpop-manger.min.js - reject

// 163 Music
^https?://163.com/madr?app=\b.+platform=\b.+uid - reject
^https?://haitaoad.nosdn.127.net/ad - reject
^https?://music.163.com/eapi/ad/ - reject

// JD
^https?://111.13.29.201/client.action\?functionId=start - reject
^https?://api.m.jd.com/client.action\?functionId=start - reject
^https?://m.360buyimg.com/mobilecms/s640x1136_jfs/ - reject

// JDjr
^https?://ms.jr.jd.com/gw/generic/base/na/m/adInfo - reject

// Taobao
^https?://gw.alicdn.com/tfs/.+-1125-1602 - reject

// Douban
^https?://14.21.76.30/view/dale-online/dale_ad/ - reject
^https?://113.96.109.97/view/dale-online/dale_ad/ - reject
^https?://img1.doubanio.com/view/dale-online/dale_ad/ - reject
^https?://img3.doubanio.com/view/dale-online/dale_ad/ - reject
^https?://erebor.douban.com/redirect/ - reject
^https?://oimagea4.ydstatic.com/image - reject

// Douyu
^https?://capi.douyucdn.cn/lapi/sign/appapi/getinfo - reject
^https?://capi.douyucdn.cn/api/v1/getStartSend - reject
^https?://douyucdn.cn/.+/appapi/getinfo - reject
^https?://staticlive.douyucdn.cn/.+/getStartSend - reject
^https?://staticlive.douyucdn.cn/upload/signs/ - reject

// ele
^https?://elemecdn.com/.+/sitemap - reject
^https?://m.elecfans.com/static/js/ad.js - reject
^https?://www1.elecfans.com/www/delivery/ - reject

// ios.win007
^https?://ios.win007.com/Phone/images - reject

// letv
^https?://ark.letv.com/adx\?adzone= - reject
^https?://ark.letv.com/t\?mid=\d{7}$ - reject

// Toutiao
^https?://p\d{1}.pstatp.com/origin - reject
^https?://pb\d{1}.pstatp.com/origin - reject

// Weibo
^https?://d\d{1}.sina.com.cn - reject
^https?://sdkapp.mobile.sina.cn/interface/sdk/actionad.php - reject
^https?://sdkapp.mobile.sina.cn/interface/sdk/sdkad.php - reject
^https?://simg.s.weibo.com/.+_ios\d{2}.gif - reject
^https?://u1.img.mobile.sina.cn/public/files/image/750x\d{2,4} - reject
^https?://wbapp.mobile.sina.cn/interface/f/ttt/v3/freshguidad.php - reject
^https?://wbapp.mobile.sina.cn/interface/win/winad.php - reject
^https?://wbapp.mobile.sina.cn/wbapplua/wbpullad.ua - reject
^https?://wbapp.uve.weibo.com/wbapplua/wbpullad.lua - reject

// Wiki
^https?://.+.(m.)?wikipedia.org/wiki http://www.wikiwand.com/en 302
^https?://zh.(m.)?wikipedia.org/(zh-hans|zh-sg|zh-cn|zh(?=/)) http://www.wikiwand.com/zh 302
^https?://zh.(m.)?wikipedia.org/zh-[a-zA-Z]{2,} http://www.wikiwand.com/zh-hant 302

// Xianyu
^https?://gw.alicdn.com/mt/ - reject
^https?://gw.alicdn.com/tfs/.+\d{3,4}-\d{4} - reject
^https?://gw.alicdn.com/tps/.+\d{3,4}-\d{4} - reject

// Ximalaya
^https?://adse.+\.com\/[a-z]{4}\/loading\?appid= - reject
^https?://adse.ximalaya.com\/ting\/feed\?appid= - reject
^https?://adse.ximalaya.com\/ting\/loading\?appid= - reject
^https?://adse.ximalaya.com\/ting\?appid= - reject
^https?://fdfs.xmcdn.com/group21/M03/E7/3F/ - reject
^https?://fdfs.xmcdn.com/group21/M0A/95/3B/ - reject
^https?://fdfs.xmcdn.com/group22/M00/92/FF/ - reject
^https?://fdfs.xmcdn.com/group22/M05/66/67/ - reject
^https?://fdfs.xmcdn.com/group22/M07/76/54/ - reject
^https?://fdfs.xmcdn.com/group23/M01/63/F1/ - reject
^https?://fdfs.xmcdn.com/group23/M04/E5/F6/ - reject
^https?://fdfs.xmcdn.com/group23/M07/81/F6/ - reject
^https?://fdfs.xmcdn.com/group23/M0A/75/AA/ - reject
^https?://fdfs.xmcdn.com/group24/M03/E6/09/ - reject
^https?://fdfs.xmcdn.com/group24/M07/C4/3D/ - reject
^https?://fdfs.xmcdn.com/group25/M05/92/D1/ - reject

// Zhangyue
^https?://book.img.ireader.com/group6/M00 - reject

// Youdao
^https?://dict.youdao.com/infoline/style\?client= - reject
^https?://gorgon.youdao.com/gorgon/request.s\?v= - reject
^https?://impservice.dictapp.youdao.com/imp/request.s\?req= - reject
^https?://oimagea\d.ydstatic.com/image\?id=.+adpublish - reject

// Yiche
^https?://api.ycapp.yiche.com/appnews/getadlist - reject
^https?://api.ycapp.yiche.com/yicheapp/getadlist - reject
^https?://api.ycapp.yiche.com/yicheapp/getappads/ - reject
^https?://cheyouapi.ycapp.yiche.com/appforum/getusermessagecount - reject

// Youtube
^.+?googlevideo.com/.+?---.+?index - reject
^https?://m.youtube.com/_get_ads - reject
^https?://pagead2.googlesyndication.com/pagead/ - reject
^https?://r\d---sn-(\w+|\w+-\w+).googlevideo.com - reject
^https?://s0.2mdn.net/ads/ - reject
^https?://stats.tubemogul.com/stats/ - reject

// 0013
^https?://.+0013.+/upload/activity/app_flash_screen_ - reject

// Tianshan live
^http?://www.tsytv.com.cn/api/app/ios/ads - reject

// KFC
^https?://res.kfc.com.cn/advertisement/ - reject

// Shouyue auto
^https?://img.yun.01zhuanche.com/statics/app/advertisement/.+-750-1334 - reject

// Shenzhou auto
^https?://img01.10101111cdn.com/adpos/share/ - reject

// Flow cbb
^https?://bank.wo.cn/v9/getstartpage - reject

// Haiyan
^https?://img.ihytv.com/material/adv/img/ - reject

// Meituan Waimai
^https?://p\d{1}.meituan.net/wmbanner/ - reject

// QQPim
^https?://mmgr.gtimg.com/gjsmall/qqpim/public/ios/splash/.+/\d{4}_\d{4} - reject

// JiemianNews
^https?://img.jiemian.com/ads/ - reject

// Auto home
^https?://adproxy.autohome.com.cn/AdvertiseService/ - reject
^https?://app2.autoimg.cn/appdfs/ - reject

// Qidiandushu
^https?://mage.if.qidian.com/Atom.axd/Api/Client/GetConfIOS - reject

// DangDang
^https?://img\d{2}.ddimg.cn/upload_img/.+/670x900 - reject
^https?://img\d{2}.ddimg.cn/upload_img/.+/750x1064 - reject
^https?://mapi.dangdang.com/index.php\?action=init&user_client=iphone - reject

// Dnvod
^https?://m.dnvod.tv http://m.dnvod.tv/\?mobile=true header
^https?://www.dnvod.tv/Ads/250.htm\?r= http://m.dnvod.tv/?mobile=true header
^https?://static.dnvod.tv/upload/doing - reject
^https?://static.dnvod.tv/upload/gaming - reject
^https?://www.dnvod.tv/images/LoadTest - reject
^https?://www.dnvod.tv/upload/gaming - reject

// Guotai
^https?://dl.app.gtja.com/operation/config/startupConfig.json - reject

// Laifeng Live
^https?://api.laifeng.com/v1/start/ads - reject

// Douyin
^https?://aweme.snssdk.com/aweme/v1/screen/ad/ - reject

// Xiachufang
^https?://api.xiachufang.com/v2/ad/ - reject

// Facebook
^https?://connect.facebook.net/en_US/fbadnw.js - reject

// Kuaidi100
^https?://qzonestyle.gtimg.cn/qzone/biz/gdt/mob/sdk/ios/v2/ - reject
^https?://cdn.kuaidi100.com/images/open/appads - reject
^https?://p.kuaidi100.com/mobile/mainapi.do - reject

// MiFit
^https?://hm.xiaomi.com/.+/app/startpages.json - reject
^https?://hm.xiaomi.com/.+/soc/well/list/community - reject
^https?://hm.xiaomi.com/discovery/mi/discovery/homepage_ad - reject
^https?://hm.xiaomi.com/discovery/mi/discovery/sport_ad - reject

// Weico
^https?://.+/portal.php\?a=get_ads - reject
^https?://.+/portal.php\?c=duiba - reject
^https?://.+/portal.php\?a=get_coopen_ads - reject
^https?://weicoapi.weico.cc/img/ad/ - reject
^https?://.+/weico4ad/ad/ - reject

// StarFans
^https?://g.cdn.pengpengla.com/starfantuan/boot-screen-info/ - reject

// Discuz
^https?://discuz.gtimg.cn/cloud/scripts/discuz_tips.js - reject

// Guopan
^https?://sapi.guopan.cn/get_buildin_ad - reject

// Jiakaobaodian
^https?://789.kakamobi.cn/.+adver - reject
^https?://smart.789.image.mucang.cn/advert - reject

// Zhaoshang cbb
^https?://pic1cdn.cmbchina.com/appinitads/ - reject

// Cmblife
^https?://mlife.cmbchina.com/ClientFace/preCacheAdvertise.json - reject

// 163 News
^https?://g1.163.com/madfeedback - reject
^https?://img1.126.net/.+dpi=6401136 - reject
^https?://img1.126.net/channel14/ - reject
^https?://nex.163.com/q - reject

// ElongClient
^http?://123.59.30.10/adv/advInfos - reject

// AiRav
^https?://bbs.airav.cc/data/.+.jpg - reject
^https?://image.airav.cc/AirADPic/.+.gif - reject
^https?://m.airav.cc/images/Mobile_popout_cn.gif - reject

// IfengNews
^https?://c1.ifengimg.com/.+_w1080_h1410.jpg - reject

// Tencent guanjia
^https?://mmgr.gtimg.com/gjsmall/qiantu/upload/ - reject

// Peanut
^https?://cmsapi.wifi8.com/v1/emptyAd/info - reject
^https?://cmsapi.wifi8.com/v2/adNew/config - reject

// Tencent live
^https?://bla.gtimg.com/qqlive/\d{6}.+.png - reject
^https?://lives.l.qq.com/livemsg\?sdtfrom= - reject
^https?://splashqqlive.gtimg.com/website/\d{6} - reject

// AppSo
^https?://sso.ifanr.com/jiong/IOS/appso/splash/ - reject

// Other
^.+/ad(s|v)?.js - reject
^.+/allOne.php\?ad_name=main_splash_ios - reject
^.+\?resource=article\/recommend\&accessToken= - reject
^.+nga\.cn.+\bhome.+\b=ad - reject
^https?://.+/allOne.php\?ad_name=main_splash_ios - reject
^https?://\?resource=article\/recommend\&accessToken=. - reject
^https?://cfg.m.ttkvod.com/mobile/ttk_mobile_1.8.txt http://ogtre5vp0.bkt.clouddn.com/Static/TXT/ttk_mobile_1.8.txt header
^https?://cnzz.com/ http://ogtre5vp0.bkt.clouddn.com/background.png? header
^https?://creatives.ftimg.net/ads/ - reject
^https?://dd.iask.cn/ddd/adAudit - reject
^https?://g.tbcdn.cn/mtb/ - reject
^https?://gorgon.youdao.com\/gorgon\/request\.s\?v= - reject
^https?://huichuan.sm.cn/jsad? - reject
^https?://impservice.youdao.com\/imp\/request\.s\?req= - reject
^https?://iphone265g.com/templates/iphone/bottomAd.js - reject
^https?://issuecdn.baidupcs.com/issue/netdisk/guanggao/ http://ogtre5vp0.bkt.clouddn.com/background.png? header
^https?://m.+.china.com.cn/statics/sdmobile/js/ad - reject
^https?://m.+.china.com.cn/statics/sdmobile/js/mobile.advert.js - reject
^https?://m.+.china.com.cn/statics/sdmobile/js/mobileshare.js - reject
^https?://m.elecfans.com/static/js/ad.js - reject
^https?://m.qu.la/stylewap/js/wap.js http://ogtre5vp0.bkt.clouddn.com/qu_la_wap.js 302
^https?://m.yhd.com/1/? http://m.yhd.com/1/?adbock= 302
^https?://mi.gdt.qq.com\/gdt_mview.fcg\?posid= - reject 
^https?://n.mark.letv.com/m3u8api/ http://burpsuite.applinzi.com/Interface header
^https?://nga\.cn.+\bhome.+\b=ad - reject
^https?://player.hoge.cn/advertisement.swf - reject
^https?://ress.dxpmedia.com/appicast/ - reject
^https?://s1.api.tv.itc.cn/v4/mobile/feeling/list.json\?api_key= - reject
^https?://s3.pstatp.com/inapp/TTAdblock.css - reject
^https?://sqimg.qq.com/ https://sqimg.qq.com/ 302
^https?://statc.mytuner.mobi/media/banners/ - reject
^https?://static.cnbetacdn.com/assets/adv - reject
^https?://static.iask.cn/m-v20161228/js/common/adAudit.min.js - reject
^https?://static.m.ttkvod.com/static_cahce/index/index.txt http://ogtre5vp0.bkt.clouddn.com/Static/TXT/index.txt header
^https?://v.17173.com/api/Allyes/ - reject
^https?://wmedia-track.uc.cn - reject
^https?://www.ft.com/__origami/service/image/v2/images/raw/https%3A%2F%2Fcreatives.ftimg.net%2Fads* - reject
^https?://www.inoreader.com/adv/ - reject
^https?://www.iqshw.com/d/js/m http://burpsuite.applinzi.com/Interface header
^https?://www.iqshw.com/d/js/m http://rewrite.websocket.site:10/Other/Static/JS/Package.js? header
^https?://www.lianbijr.com/adPage/ - reject

[Host]
';

foreach ($result as $key => $value)
{
    $export .= $value[1] . ' = ' . $value[0] . "\r\n";
}
$export = urldecode($export);

if (file_put_contents(dirname(__FILE__) . '/hosts.conf', $export))
{
    println('Export to hosts.conf successfully.');
}
println('Error occured.');
