<?php
namespace WadeYu\LaravelValidator;
use Validator as LaravelValidator; //laravel����Դ�facades��
/**
 * ������չ��
 */
class Boot{
	/**
	 * @var ��������ʶ
	 */
	private static $booted = false;
	
	/**
	 * ��չlaravel��֤��
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