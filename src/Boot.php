<?php
namespace WadeYu\LaravelValidator;
use Validator as LaravelValidator; //laravel框架自带facades类
/**
 * 启动扩展类
 */
class Boot{
	/**
	 * @var 已启动标识
	 */
	private static $booted = false;
	
	/**
	 * 扩展laravel验证器
	 *
	 * @return void
	 */
	public static function extend(){
		if(self::$booted){
			return ;
		}
		self::$booted = true;
		$aCfg = require __DIR__.'/config.php';
		$cls = Validator::class;
		foreach($aCfg as $k => $v){
			$m = ucfirst($k);
			if(strpos($k,'_') !== false){
				$aK = explode('_',$k);
				$aK = array_map('ucfirst',$aK);
				$m = implode('',$aK);
			}
			LaravelValidator::extend($k,"{$cls}@validate{$m}",$v['message']);
			LaravelValidator::replacer($k,"{$cls}@replace{$m}");
		}
	}
}