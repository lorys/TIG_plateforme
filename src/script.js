function query(text)
{
	co = new XMLHttpRequest();
	co.open("GET", "jarvis.php?query="+text, true);
	co.onreadystatechange=function () {
		if (co.readyState == 4){
			console.log(co.responseText);
			return (co.responseText);
		}
	};
	co.send(null);
}

function refresh_posts()
{
	ret = query("posts");
	if (!ret)
		return;
	posts = JSON.parse($ret);
	for (a = 0; posts[a]; a++)
	{
		console.log(posts[a]);
		document.getElementById('posts').innerHTML+="<div class=\"post\">\
				<div class=\"vote\">\
<div class=\"up\">&lt;</div>\
<div class=\"down\">&gt;</div>\
				</div>\
				<div class=\"content\">\
"+posts[a]["content"]+"\
				</div>\
				<div class=\"comments\">\
\
				</div>\
			</div>";

	}
}

function send_propose(text)
{
	if (query("proposition&data="+text) == "success")
	{
		refresh_posts();
	}
}
