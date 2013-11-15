/*
	Author yanxf

rule参数:

required		//必填
name			//字母、数字、下划线
ip				//ip
mobile			//手机号码
telephone       //固话
passwd			//字母、数字、下划线
english			//英文单词
chinese			//中文字符
number			//数字
integer			//整数
unsignedInteger	//无符号整数
positiveInteger	//正整数
price			//非负数字
url				//url格式
email			//Email格式
idcard 			//身份证验证
doorplate		//门牌，摊位号 (-) XX-XXX-XXX
text300         //小于300字符
fileimg 		// 上传图片格式验证  jpg,png,gif
qq   			//QQ验证             
discount
show_type参数:
Layer	//浮动层
After	//追加后面


用法例子：

	语法
		$('input[name=item]').validate(['required','name']);

	失去焦点时验证方法
		$('input[name=item]').blur(function(){
			$(this).validate(['required','name']);
		})

	提交表单时验证方法
		$('form[name=goodsadd]').submit(function(){
			validateResult = true;
			$('input[name=item]').validate(['required','name']);
			return validateResult;
		})

*/
var validateResult = true;

jQuery.fn.extend({
	validate: function(rule,show_type,message) {

		if(typeof(show_type)=="undefined")
			show_type = 'After';

		validateNumber = $(this).size();
	//alert($(this).size());
		validateCheckboxResult = false;

		this.each(function(){
			for(n in rule){
			//	console.log(rule[n]);
				var msg = eval(rule[n]+"Validate(this)");
				
				if(msg == '')
					eval("show"+show_type+"Msg(this,msg,true)");
				else{
                    if(typeof(message) !='undefined' && message!='' && message.length !=0)
                    msg = message;
					eval("show"+show_type+"Msg(this,msg,false)");
					validateResult = false;
					break;
				}
			}
		})
//    return this.each(function() { this.checked = true; });
		return validateResult;
	}
});

function showLayerMsg(that,msg,type)
{
	if(type)
		$(that).css('background-color','');
	else{
		$(that).css('background-color','#ffe0e1');
		showMessage(that, msg,false)
	}
}

//前后台不同 该方法分别放在各自布局里
function showAfterMsg(that,msg,type)
{
	if(type)
		//$(that).css('background-color','');
        $(that).parent().parent().removeClass('has-error');
	else{
		//$(that).css('background-color','#FFBBC9');
        $(that).parent().parent().addClass('has-error');
		showMessage(that, msg,false)
	}
}

function showMessage(that, msg, type){
    if(type){
        //$(that).css('background-color','');
        //$(that).parent().parent().removeClass('has-error');
    }else{
        //$(that).parent().parent().addClass('has-error');
        //$(that).after("<span  class='help-block'>"+ msg +"</span>");
    }
}

function fileimgValidate(that){
	var error = '';
	var val = $(that).val();
	if(val.length != 0){
		var array = val.split('.');
		var type = array[array.length-1].toLowerCase();
		var reg = /(jpg|gif|jpeg)+$/;
		if(!reg.test(type))
			error = '只能是jpg,gif格式';
	}
	return error;
}
function text300Validate(that){
	var error = '';
	var val = $(that).val();
	if(val.length >=300)
	{
		error = '不能超过300字';
	}
	return error;
}
function requiredValidate(that)
{
	var error = '';
	//checkbox方式show_type参数必须为Layer
	if($(that).attr('type')=='checkbox' || $(that).attr('type')=='radio')
	{
		validateNumber--;
//		console.log(validateNumber);
//		console.log(validateCheckboxResult);
		if($(that).attr('checked'))
		{
			validateCheckboxResult = true;
		}
		if(validateNumber == 0)
		{
			if(!validateCheckboxResult)
				error = '至少选择一个';
		}
	}else{
		if($(that).val() == '')
		{
			error = '不能为空';
		}
	}
	return error;
}

function nameValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isNumEng(val))
			error = '只能包括英文字母、数字和下划线';
	}
	return error;
}

function ipValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isIp(val))
			error = '请输入正确的IP格式';
	}
	return error;
}
function mobileValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isMobile(val))
			error = '请输入正确的手机号码';
	}
	return error;
}

function telephoneValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(0 != val.length){
		if(!isTelephone(val))
			error ='固话格式0000-0000000';
	}
	return error;
	
}
function passwdValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isPasswd(val))
			error = '密码长度至少6位';
	}
	return error;
}

function englishValidate(that){

    var error="";
    var val = $(that).val();
    if(val != ""){
        if(!isEnglish(val))
            error="只能是英文字母";
    }
    return error;
}

function chineseValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isChinese(val))
			error = '只能填写中文';
	}
	return error;
}

function usernameValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isEmail(val) && !isMobile(val))
			error = '请使用Email或手机号码';
	}
	return error;
}


function chnameValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isChinese(val))
			error = '只能填写中文';
		else if(val.length>10)
			error = '不能超过10个中文字符';
	}
	return error;
}

function length20Validate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(val.length>20)
			error = '不能超过20个字符';
	}
	return error;
}
function length100Validate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(val.length>100)
			error = '不能超过100个字符';
	}
	return error;
}

function numberValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isNumber(val))
			error = '请填写数字';
	}
	return error;
}
function integerValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isInteger(val))
			error = '请填写整数';
	}
	return error;
}
function unsignedIntegerValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isInteger(val))
			error = '请填写正整数';
		else{
			if(Number(val) < 0)
				error = '请填写正整数';
		}
	}
	return error;
}
function positiveIntegerValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isInteger(val))
		{
			error = '请填写正整数';
		}else{
			if(Number(val) <= 0)
				error = '请填写正整数';
		}
	}
	return error;
}

function priceValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isPrice(val))
			error = '请输入正确的价格';
	}
	return error;
}

function weightValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isWeight(val))
			error = '请输入正确的重量';
	}
	return error;
}

function urlValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isUrl(val))
			error = '请输入正确的URL';
	}
	return error;
}

function emailValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isEmail(val))
			error = '请输入正确的Email';
	}
	return error;
}
function doorplateValidate(that)
{
	var error = '';
	var val = $(that).val();
	var reg = /^(-?(([1-9])|([1-1][0-1]))-((\d{1,3})|((\d{1,3})-(\d{1,3}))))$/;//专用
	if (!reg.test(val)){
		error = "摊位号不正确";
	}
	return error;

}
function zipcodeValidate(that)
{
	var error = '';
	var val = $(that).val();
	if(val != '')
	{
		if(!isZipCode(val))
			error = '请输入正确的邮政编码';
	}
	return error;
}

function qqValidate(that){
	var error = '';
	var val = $(that).val();
	if(val != ''){
		if(!isQq(val))
			error = '请输入正确的QQ号码';
	}
	return error;
}

function idcardValidate(that)
{
	var error = '';
	var card = $(that).val();
 

    //是否为空
    if(card === '')
    {
        error='身份证号不能为空';
        return error;
    }
    //校验长度，类型
    if(isCardNo(card) === false)
    {
        error='身份证号码格式不正确';
        var reg = /(^\d{15}$)|(^\d{17}(\d|x)$)/;
        if(reg.test(card))
        	error = '最后一位是大写X';
        return error;
    }
    //检查省份
    if(checkProvince(card) === false)
    {
        error='身份证号码省份格式不正确';
        return error;
    }
    //校验生日
    if(checkBirthday(card) === false)
    {
        error='身份证号码生日不正确';
        return error;
    }
    //检验位的检测
    if(checkParity(card) === false)
    {
        error='身份证校验位不正确';
        return error;
    }
    return error;
}

//检查号码是否符合规范，包括长度，类型
isCardNo = function(card)
{
    //身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X
    var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;
    if(reg.test(card) === false)
    {
        return false;
    }

    return true;
};

//取身份证前两位,校验省份
checkProvince = function(card)
{
	var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",
    21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",
    33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",
    42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",
    51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",
    63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"
   };
    var province = card.substr(0,2);
    if(vcity[province] == undefined)
    {
        return false;
    }
    return true;
};

//检查生日是否正确
checkBirthday = function(card)
{
    var len = card.length;
    //身份证15位时，次序为省（3位）市（3位）年（2位）月（2位）日（2位）校验位（3位），皆为数字
    if(len == '15')
    {
        var re_fifteen = /^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/; 
        var arr_data = card.match(re_fifteen);
        var year = arr_data[2];
        var month = arr_data[3];
        var day = arr_data[4];
        var birthday = new Date('19'+year+'/'+month+'/'+day);
        return verifyBirthday('19'+year,month,day,birthday);
    }
    //身份证18位时，次序为省（3位）市（3位）年（4位）月（2位）日（2位）校验位（4位），校验位末尾可能为X
    if(len == '18')
    {
        var re_eighteen = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/;
        var arr_data = card.match(re_eighteen);
        var year = arr_data[2];
        var month = arr_data[3];
        var day = arr_data[4];
        var birthday = new Date(year+'/'+month+'/'+day);
        return verifyBirthday(year,month,day,birthday);
    }
    return false;
};

//校验日期
verifyBirthday = function(year,month,day,birthday)
{
    var now = new Date();
    var now_year = now.getFullYear();
    //年月日是否合理
    if(birthday.getFullYear() == year && (birthday.getMonth() + 1) == month && birthday.getDate() == day)
    {
        //判断年份的范围（3岁到100岁之间)
        var time = now_year - year;
        if(time >= 1 && time <= 150)
        {
            return true;
        }
        return false;
    }
    return false;
};

//校验位的检测
checkParity = function(card)
{
    //15位转18位
    card = changeFivteenToEighteen(card);
    var len = card.length;
    if(len == '18')
    {
        var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
        var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
        var cardTemp = 0, i, valnum; 
        for(i = 0; i < 17; i ++) 
        { 
            cardTemp += card.substr(i, 1) * arrInt[i]; 
        } 
        valnum = arrCh[cardTemp % 11]; 
        if (valnum == card.substr(17, 1)) 
        {
            return true;
        }
        return false;
    }
    return false;
};

//15位转18位身份证号
changeFivteenToEighteen = function(card)
{
    if(card.length == '15')
    {
        var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
        var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
        var cardTemp = 0, i;   
        card = card.substr(0, 6) + '19' + card.substr(6, card.length - 6);
        for(i = 0; i < 17; i ++) 
        { 
            cardTemp += card.substr(i, 1) * arrInt[i]; 
        } 
        card += arrCh[cardTemp % 11]; 
        return card;
    }
    return card;
};


















/* 底层用检测方法 */
function isPasswd(value)
{
	var reg = /^[^\s]{6,20}$/;
	return reg.test(value);
}

//检查是否数字
function isNumber(value)
{
	var reg = /^-?[0-9]*(\.\d*)?$|^-?d^(\.\d*)?$/;
	return reg.test(value);
}
function isPrice(value)
{
	var reg = /^([1-9][0-9]*|([0]\.\d{1,2}){1}|0)(\.\d{1,2})?$/;
	return reg.test(value);
}
function isWeight(value)
{
	var reg = /^([1-9][0-9]*|([0]\.\d{1,3}){1}|0)(\.\d{1,3})?$/;
	return reg.test(value);
}
//检查整数
function isInteger(value)
{
	var reg = /^-?\d+$/;
	return reg.test(value);
}
//邮政编码
function isZipCode(value)
{
	var reg = /^[0-9]{6}$/;
	return reg.test(value);
}

//英文
function isEnglish(value)
{
	var reg = /^[A-Za-z]+$/;
	return reg.test(value);
}
//检查中文
function isChinese(value)
{
	var reg = /^[\u0391-\uFFE5]+$/;
	return reg.test(value);
}
//数字或字母
function isNumEng(value)
{
	var reg = /^[0-9a-zA-Z_]+$/;
	return reg.test(value);
}
//ip
function isIp($value)
{
	var reg = /^(\d+)\.(\d+)\.(\d+)\.(\d+)$/;
	return reg.test(value) && (RegExp.$1 < 256 && RegExp.$2< 256 && RegExp.$3< 256 && RegExp.$4< 256);
}
//手机号码
function isMobile(value)
{
	var reg = /^(((1[3,5,8,9]{1}[0-9]{1}))+\d{8})$/;
	//var reg = /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/;
	return value.length == 11 && reg.test(value);
}
function isTelephone(value)
{
	var reg = /^((0\d{2,3})-)(\d{7,8})(-(\d{1,3}))?$/;

	return reg.test(value);

}
function isUrl(value)
{
	var reg = /^http(s)?:\/\/(?!([\w-]+\.[\w-]+$))([\w-]+\.)+[\w-]+(\/[\w-   .\/?%&=]*)?$/;
	return reg.test(value);
}
function isEmail(value)
{
	var reg = /^[\w\.\-\+]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
	return reg.test(value);
}

function isQq(value)
{
	var reg = /^[1-9]\d{4,8}$/;
	return reg.test(value);
}

/*
//检查无符号整数
function isUnsignedInteger(value)
{
	var reg = /^\d+?$/;
	return reg.test(value);
}
//检查正整数
function isPositiveInteger(value)
{
	var reg = /^\+?[1-9][0-9]*$/;
	return reg.test(value);
}

//检测正整数
function isUnsignedInteger(strInteger)
{
	var	newPar="^[0-9]+$";
	var re = new RegExp(newPar);
	return re.test(strInteger);
}
*/




