<?php
/*  ����ΪMyTpl���Զ����ģ�����棬��PHP�ű��д���������� */
/*  ͨ������������ģ���ļ�����������������Ľ�����         */
class MyTpl {
        	/* ����Ĺ��췽������������ʱ��ʹ����Ա����      */
         	/* ����template_dir: ָ�����ģ���ļ���λ��Ŀ¼    */
         	/* ����compile_dir: ָ����ű�����ģ���ļ�λ��   */
		function __construct($template_dir='./templates/', $compile_dir='./templates_c/') {              
			$this->template_dir=rtrim($template_dir,'/').'/';   //��./templates/Ŀ¼��Ϊģ����Ŀ¼
			$this->compile_dir=rtrim($compile_dir,'/').'/';    //��ʹ���������ģ����Ŀ¼
			$this->tpl_vars=array();                     //Ϊ��Ա����tpl_vars��ֵΪ������
		}
         	/* ���ø÷�����������ֵ�����ģ���ж�Ӧ�ı���                   */
         	/* ����tpl_val: ��Ҫһ���ַ���������Ҫ��ģ���еı�������Ӧ       */
         	/* ����value: ��Ҫһ���������͵�ֵ�����������ģ���б�����ֵ    */
		function assign($tpl_var, $value = null) {   
			if ($tpl_var != '')                    //�����һ������$tpl_var����һ�����ַ���
				$this->tpl_vars[$tpl_var] = $value; //���ڶ��������ṩ��ֵ	��ӵ�����tpl_var��
		}
         	/* ����ָ��Ŀ¼�µ�ģ���ļ��� ��������������ݴ�ŵ���һ��ָ��Ŀ¼�µ��ļ��� */
		/* ����fileName:�ṩģ���ļ����ļ���                                         */		    
		function display($fileName) { 
			$tplFile=$this->template_dir.$fileName;     //��ָ����Ŀ¼��Ѱ��ģ���ļ�
			if(!file_exists($tplFile)) {                 //�����Ҫ�����ģ���ļ�������
				return false;                       //����ú���ִ�з���false
			}
              		//��ȡ�������ģ���ļ������ļ��е����ݶ��Ǳ��滻����
			$comFileName=$this->compile_dir."com_".basename($tplFile).'.php';  
              		//�ж��滻����ļ��Ƿ���ڻ��Ǵ��ڵ��иĶ�������Ҫ���´���
			if(!file_exists($comFileName) || filemtime($comFileName) < filemtime($tplFile)) {
				$repContent=$this->tpl_replace(file_get_contents($tplFile));  //�����ڲ��滻ģ�巽��
				$handle=fopen($comFileName, 'w+');  //��һ�����������������ļ�                             
				fwrite($handle, $repContent);         //���ļ���д������                                              
				fclose($handle);                    //�رմ򿪵��ļ�
			}
			include($comFileName);		         //����������ģ���ļ�������ͻ���
		}
         	/*  �÷���ʹ��������ʽ��ģ���ļ�'<{ }>'�е�����滻Ϊ��Ӧ��ֵ��PHP���� */
         	/*  ����content: �ṩ��ģ���ļ��ж����ȫ�������ַ���                     */
		private function tpl_replace($content){
			$pattern=array(        //ƥ��ģ���и��ֱ�ʶ����������ʽ��ģʽ����
				'/<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>/i',  //ƥ��ģ���б���
				'/<\{\s*if\s*(.+?)\s*\}>(.+?)<\{\s*\/if\s*\}>/ies',             //ƥ��ģ����if��ʶ��
				'/<\{\s*else\s*if\s*(.+?)\s*\}>/ies',                        //ƥ��elseif��ʶ��
				'/<\{\s*else\s*\}>/is',                                  //ƥ��else��ʶ��
'/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is',                //����ƥ��ģ���е�loop��ʶ�����������������е�ֵ
'/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*=>\s*\$(\S+)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is',   //����ƥ��ģ���е�loop��ʶ�����������������еļ���ֵ
				'/<\{\s*include\s+[\"\']?(.+?)[\"\']?\s*\}>/ie'                //ƥ��include��ʶ��
			);
			$replacement=array(   //�滻��ģ����ʹ��������ʽƥ�䵽���ַ�������
				'<?php echo $this->tpl_vars["${1}"]; ?>',                 //�滻ģ���еı���
				'$this->stripvtags(\'<?php if(${1}) { ?>\',\'${2}<?php } ?>\')', //�滻ģ���е�if�ַ���
				'$this->stripvtags(\'<?php } elseif(${1}) { ?>\',"")',         //�滻elseif���ַ���
				'<?php } else { ?>',                                  //�滻else���ַ���
				'<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"]) { ?>${3}<?php } ?>',  
'<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"] => $this->tpl_vars["${3}"]) { ?>${4}<?php } ?>',    //�����������滻ģ���е�loop��ʶ��Ϊforeach��ʽ
				'file_get_contents($this->template_dir."${1}")'         //�滻include���ַ���
			);
			$repContent=preg_replace($pattern, $replacement, $content);  //ʹ�������滻��������
			if(preg_match('/<\{([^(\}>)]{1,})\}>/', $repContent)) {       //�������Ҫ�滻�ı�ʶ
				$repContent=$this->tpl_replace($repContent);         //�ݹ�����Լ��ٴ��滻
			} 
			return $repContent;                                   //�����滻����ַ���
		}
         	/* �÷������������������ʹ�õı����滻Ϊ��Ӧ��ֵ             */
         	/* ����expr: �ṩģ�����������Ŀ�ʼ���                     */
         	/* ����statement: �ṩģ�����������Ľ������                 */
		private function stripvtags($expr, $statement='') {
			$var_pattern='/\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*/is';  //ƥ�����������
			$expr = preg_replace($var_pattern, '$this->tpl_vars["${1}"]', $expr);   //�������滻Ϊֵ
			$expr = str_replace("\\\"", "\"", $expr);             //����ʼ����е�����ת���滻
			$statement = str_replace("\\\"", "\"", $statement);     //�滻�����ͽ�������е�����
			return $expr.$statement;                         //��������������������󷵻�
		}
	}
?>
