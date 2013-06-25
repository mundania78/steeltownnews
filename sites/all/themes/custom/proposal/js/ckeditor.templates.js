/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license

Customized for the Allegheny Front
*/

CKEDITOR.addTemplates('default',
	{
		imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates')+'templates/images/'),
		templates:[
			{
				title:'Two Column',
				image:'template1.gif',
				description:'A two column layout element for placing two columns of text into the page.',
				html:'<div class="row-fluid"><div class="span6"><h3>Type the title here</h3><p>Type the text here</p></div><div class="span6"><h3>Type the title here</h3><p>Type the text here</p></div></div>'
			},
			{
				title:'Three Column',
				image:'template1.gif',
				description:'A three column layout element for placing two columns of text into the page.',
				html:'<div class="row-fluid"><div class="span4"><h3>Type the title here</h3><p>Type the text here</p></div><div class="span4"><h3>Type the title here</h3><p>Type the text here</p></div><div class="span4"><h3>Type the title here</h3><p>Type the text here</p></div></div>'
			},
			{
				title:'Embed Media',
				image:'',
				description:'Embed media in a responsive/fluid way to appear on a variety of devices',
				html:'<div class="video"><div class="video-inner"><p>Place your embedded media here</p></div></div>'
			}

		]
	}
);
