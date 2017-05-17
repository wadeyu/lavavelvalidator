<?php
namespace WadeYu\LaravelValidator;
/**
 * 验证器类
 */
class Validator{
	/**
	 * 验证中文字符最大个数
	 *
	 * @param string $attribute 属性名
	 * @param string $value 待验证内容
	 * @param array $parameters 规则参数
	 *
	 * @return boolean true通过 false不通过
	 */
	public function validateMaxZhcn($attribute,$value,$parameters){
		if(!is_string($value)){
			return false;
		}
		if( preg_match_all('/[\x{4e00}-\x{9fa5}]/u',$value) > $parameters[0] ){
			return false;
		}
		return true;
	}
	
	/**
	 * max_zhcn规则失败内容提示处理
	 *
	 * @param string $message 提示内容
	 * @param string $attribute 属性名称
	 * @param mixed $rule 规则
	 * @param array $parameters 规则参数
	 *
	 * @return string
	 */
	public function replaceMaxZhcn($message,$attribute,$rule,$parameters){
		return str_replace([':attr',':max_zhcn'],[$attribute,$parameters[0]],$message);
	}
	
	// to do list 
}