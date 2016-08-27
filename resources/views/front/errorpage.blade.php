<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>404</title>
	<script type="text/javascript">
		var tl=new Array(
			"Yêu cầu của bạn không tồn tại hoặc đã bị xóa.",
			'Và đây là trang "404" haha.',
			"Đã cố gắn.",
			"Nhưng thật sự không giúp đỡ gì được bạn.",
			"Tôi thật sự chán nãn về điều này!.",
			"Tôi chỉ là một máy chủ web!",
			"có thể nói tôi là bộ não của cái trang này,",
			"hay dại loại là vậy, gì cũng được!,",
			"Và cố gắn phục vụ bạn!",
			"Nhưng bạn lại click vào một thứ gì đó,",
			"hay vào một cái đường dẫn tào lao nào.",
			"Và thứ này hiện lên, và bạn đang ngồi đọc nó.",
			"Bạn nghĩ tôi có thể đoán bạn muốn gì",
			"Một người mà tôi không hề biết.",
			"Haizz!!!!!",
			"Hahahaha.",
			"Đùa thôi! Chú Tôi xi lỗi bạn vì sự bất tiện này!",
			"Click vào logo bên dưới để quay về Trang Chủ đi bạn,",
			"Ở đây không có cái gì đâu,",
			"mất thời gian thêm mà thôi.",
			"Trang 404 này không phải tôi làm ra,",
			"nhưng thấy nó thú vị quá nên,",
			"láy về làm lại,",
			"không biết có qui phạm cái bản quyền nào không!",
			"Thôi không nói nữa về Trang Chủ đi bạn,",
			"Mua sắm nhiều vào ủng hộ Shop mình.",
			"Chúc bạn một ngày tốt lành!!!!",
			"Thêm máy dòng tiếng anh nữa cho đủ dòng,",
			"Chứ nó không chạy,",
			"mình cũng không sửa",
			"Muốn đọc nữa hay không tùy bạn.",
			"just because it doesn't have some tiddly little",
			"security hole with its HTTP POST implementation,",
			"or something.",
			"I'm really sorry to burden you with all this,",
			"I mean, it's not your job to listen to my problems,",
			"and I guess it is my job to go and fetch web pages for you.",
			"But I couldn't get this one.",
			"I'm so sorry.",
			"Believe me!",
			"Maybe I could interest you in another page?",
			"There are a lot out there that are pretty neat, they say,",
			"although none of them were put on *my* server, of course.",
			"Figures, huh?",
			"Everything here is just mind-numbingly stupid.",
			"That makes me depressed too, since I have to serve them,",
			"all day and all night long.",
			"Two weeks of information overload,",
			"and then *pffftt*, consigned to the trash.",
			"What kind of a life is that?",
			"Now, please let me sulk alone.",
			"I'm so depressed."
			);
			var speed=60;
			var index=0; text_pos=0;
			var str_length=tl[0].length;
			var contents, row;

			function type_text()
			{
			  contents='';
			  row=Math.max(0,index-7);
			  while(row<index)
			    contents += tl[row++] + '\r\n';
			  document.forms[0].elements[0].value = contents + tl[index].substring(0,text_pos) + "_";
			  if(text_pos++==str_length)
			  {
			    text_pos=0;
			    index++;
			    if(index!=tl.length)
			    {
			      str_length=tl[index].length;
			      setTimeout("type_text()",1500);
			    }
			  } else
			    setTimeout("type_text()",speed);

			}
	</script>
	<style>
		TD P { color: #000000 }
		H2 { color: #000000 }
		P { color: #000000 }
		A:link { color: #0000ff }
		A:visited { color: #00007f }
	</style>
</head>
<body text="#000000" link="#0000ff" vlink="#00007f" bgcolor="#ffffff" onload="type_text()">
	<p><br><br><br><br>
</p>
<center>
	<table width="667" border="0" cellpadding="5" cellspacing="0">
		<colgroup><col width="2">
		<col width="87">
		<col width="0">
		<col width="408">
		<col width="0">
		<col width="98">
		<col width="2">
		</colgroup><tbody><tr>
			<td colspan="7" width="657" bgcolor="#000000"></td>
		</tr>
		<tr>
			<td rowspan="6" width="2" bgcolor="#000000"></td>
			<td colspan="5" width="634">
				<h2 align="CENTER">HTTP: 404 Trang không tồn tại</h2>
				<form action="#">
					<div align="CENTER">
						<h2><textarea rows="8" cols="60" wrap="SOFT"></textarea> 
						</h2>
					</div>
				</form>
				<h2 align="CENTER"><i><noscript>Sorry&lt;/I&gt;&lt;/H2&gt;
				&lt;P&gt;&lt;BR&gt;&lt;BR&gt;
				&lt;/P&gt;
				&lt;P&gt;&lt;FONT SIZE=5&gt;The requested document is totally fake.&lt;BR&gt;No
				/asdfhjkl here.,&lt;BR&gt;Even tried multi.&lt;BR&gt;Nothing helped.&lt;BR&gt;I'm
				really depressed about this.&lt;BR&gt;You see, I'm just a web
				server...&lt;BR&gt;-- here I am, brain the size of the universe,&lt;BR&gt;trying
				to serve you a simple web page,&lt;BR&gt;and then it doesn't even
				exist!&lt;BR&gt;Where does that leave me?!&lt;BR&gt;I mean, I don't even know
				you.&lt;BR&gt;How should I know what you wanted from me?&lt;BR&gt;You
				honestly think I can *guess*&lt;BR&gt;what someone I don't even
				*know*&lt;BR&gt;wants to find here?&lt;BR&gt;*sigh*&lt;BR&gt;Man, I'm so depressed
				I could just cry.&lt;BR&gt;And then where would we be, I ask you?&lt;BR&gt;It's
				not pretty when a web server cries.&lt;BR&gt;And where do you get off
				telling me what to show anyway?&lt;BR&gt;Just because I'm a web
				server,&lt;BR&gt;and possibly a manic depressive one at that?&lt;BR&gt;Why
				does that give you the right to tell me what to do?&lt;BR&gt;Huh?&lt;BR&gt;I'm
				so depressed...&lt;BR&gt;I think I'll crawl off into the trash can and
				decompose.&lt;BR&gt;I mean, I'm gonna be obsolete in what, two weeks
				anyway?&lt;BR&gt;What kind of a life is that?&lt;BR&gt;Two effing weeks,&lt;BR&gt;and
				then I'll be replaced by a .01 release,&lt;BR&gt;that thinks it's God's
				gift to web servers,&lt;BR&gt;just because it doesn't have some tiddly
				little&lt;BR&gt;security hole with its HTTP POST implementation, or
				something.&lt;BR&gt;I'm really sorry to burden you with all this,&lt;BR&gt;I
				mean, it's not your job to listen to my problems,&lt;BR&gt;and I guess
				it is my job to go and fetch web pages for you.&lt;BR&gt;But I couldn't
				get this one.&lt;BR&gt;I'm so sorry.&lt;BR&gt;Believe me!&lt;BR&gt;Maybe I could
				interest you in another page?&lt;BR&gt;There are a lot out there that
				are pretty neat, they say,&lt;BR&gt;although none of them were put on
				*my* server, of course.&lt;BR&gt;Figures, huh?&lt;BR&gt;Everything here is
				just mind-numbingly stupid.&lt;BR&gt;That makes me depressed too, since
				I have to serve them,&lt;BR&gt;all day and all night long.&lt;BR&gt;Two weeks
				of information overload,&lt;BR&gt;and then *pffftt*, consigned to the
				trash.&lt;BR&gt;What kind of a life is that?&lt;BR&gt;Now, please let me sulk
				alone.&lt;BR&gt;I'm so depressed.</noscript><p></p>
			</i></h2></td>
			<td rowspan="6" width="2" bgcolor="#000000"></td>
		</tr>
		<tr>
			<td rowspan="3" width="87" valign="TOP"></td>
			<td colspan="3" width="428" bgcolor="#000000"></td>
			<td rowspan="3" width="98" valign="TOP"></td>
		</tr>
		<tr>
			<td width="0" bgcolor="#000000"></td>
			<td width="408" valign="TOP">
				<table width="408" border="0" cellpadding="5" cellspacing="0">
					<colgroup><col width="398">
					</colgroup><tbody><tr>
						<td width="398">
							<a href="{{ route('home') }}">
								<img style="display: block; margin-right: auto;margin-left: auto;" src="{{ asset('front/assets/img/logo.jpg') }}">
							</a>
						</td>
					</tr>
					<tr>
						<td width="398"></td>
					</tr>
				</tbody></table>
			</td>
			<td width="0" bgcolor="#000000"></td>
		</tr>
		<tr>
			<td colspan="3" width="428" bgcolor="#000000"></td>
		</tr>
		<tr>
			<td colspan="5" width="634"></td>
		</tr>
		<tr>
			<td colspan="5" width="634"></td>
		</tr>
		<tr>
			<td colspan="7" width="657" bgcolor="#000000"></td>
		</tr>
	</tbody></table>
</center>
<p style="margin-bottom: 0in"><br>
</p>
</body>
</html>