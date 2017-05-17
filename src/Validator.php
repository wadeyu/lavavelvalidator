<?php
namespace WadeYu\LaravelValidator;
/**
 * ��֤����
 */
class Validator{
	/**
	 * ��֤�����ַ�������
	 *
	 * @param string $attribute ������
	 * @param string $value ����֤����
	 * @param array $parameters �������
	 *
	 * @return boolean trueͨ�� false��ͨ��
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
	 * max_zhcn����ʧ��������ʾ����
	 *
	 * @param string $message ��ʾ����
	 * @param string $attribute ��������
	 * @param mixed $rule ����
	 * @param array $parameters �������
	 *
	 * @return string
	 */
	public function replaceMaxZhcn($message,$attribute,$rule,$parameters){
		return str_replace([':attr',':max_zhcn'],[$attribute,$parameters[0]],$message);
	}
	
	// to do list 
}