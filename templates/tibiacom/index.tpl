<!---
                      _
   created by        | |          
  __ _ _ __   ___  __| |_ __ ___  
 / _` | '_ \ / _ \/ _` | '__/ _ \ 
| (_| | |_) |  __/ (_| | | | (_) |
 \__, | .__/ \___|\__,_|_|  \___/ 
  __/ | |                         
 |___/|_|   from otland.net

-->
<html>

<head>

  <title>{$title}</title>



  <meta name="description" content="Tibia is a free massively multiplayer online role-playing game (MMORPG). Join this fascinating game that has thousands of fans from all over the world! - {$path}" />

  <meta name="author" content="CipSoft GmbH" />

  <meta http-equiv="content-language" content="en" />

  <meta name="keywords" content="free online game, free multiplayer game, free online rpg, free mmorpg, mmorpg, mmog, online role playing game, online multiplayer game, internet game, online rpg, rpg" />
{$head}


  <link rel="shortcut icon" href="{$template_path}/images/general/favicon.ico" type="image/x-icon">
  <link rel="icon" href="{$template_path}/images/general/favicon.ico" type="image/x-icon">



    <link href="{$template_path}/styles/basic.css" rel="stylesheet" type="text/css">
    <link href="{$template_path}/styles/news.css" rel="stylesheet" type="text/css">

      <script type="text/javascript" src="{$template_path}/javascripts/generic.js"></script>

  <script type='text/javascript'>  var loginStatus=0; loginStatus='false';  var activeSubmenuItem='latestnews';  var IMAGES=0; IMAGES='http://static.tibia.com/images';  var LINK_ACCOUNT=0; LINK_ACCOUNT='';  var g_FormName='';  var g_FormField='';  var g_Deactivated=false;</script>
  <SCRIPT TYPE="text/javascript"> 
<!-- // Framekiller
setTimeout ("changePage()", 6000);
function changePage()
{
  if (parent.frames.length > 2) {
    if (browserTyp == "ie") {
      parent.location=document.location;
    } else {
      self.top.location=document.location;
    }
  }
}
// -->
</SCRIPT> 
 
  <script type="text/javascript" src="{$template_path}/javascripts/initialize.js"></script>

  

</head>



<body onBeforeUnLoad="SaveMenu();" onUnload="SaveMenu();" onLoad="SetFormFocus()">



  <a name="top" ></a>



  <div id="ArtworkHelper" style="background-image:url({$template_path}/images/header/background-artwork.jpg);">

  <div id="DeactivationContainer" ></div>

        <div id="Bodycontainer" >

        <div id="ContentRow">

        <div id="MenuColumn">

          <div id="LeftArtwork">

            <a href="{$path}" ><img id="TibiaLogoArtworkTop" src="{$template_path}/images/header/tibia-logo-artwork-top.gif" alt="logoartwork" /></a>

            <img id="LogoLink" src="{$template_path}/images/header/tibia-logo-artwork-string.gif" onClick="window.location = '{$path}';" alt="logoartwork" />

          </div>

          

  <div id="Loginbox" >

    <div id="LoginTop" style="background-image:url({$template_path}/images/general/box-top.gif)" ></div>

    <div id="BorderLeft" class="LoginBorder" style="background-image:url({$template_path}/images/general/chain.gif)" ></div>
{if $logged == 1}
<div id="LoginButtonContainer" style="background-image:url({$template_path}/images/loginbox/loginbox-textfield-background.gif)" >
        <div id="PlayNowContainer" ><form class="MediumButtonForm" action="{$path}/index.php/account" method="post" ><input type="hidden" name="page" value="overview" ><div class="MediumButtonBackground" style="background-image:url({$template_path}/images/buttons/mediumbutton.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ><div class="MediumButtonOver" style="background-image:url({$template_path}/images/buttons/mediumbutton-over.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ></div><input class="MediumButtonText" type="image" name="Login" alt="Login" src="{$template_path}/images/buttons/mediumbutton_myaccount.png" /></div></form></div>
    </div>
    <div class="Loginstatus" style="background-image:url({$template_path}/images/loginbox/loginbox-textfield-background.gif)" >
      <div id="LoginstatusText" onClick="LoginstatusTextAction(this);" onMouseOver="MouseOverLoginBoxText(this);" onMouseOut="MouseOutLoginBoxText(this);" ><div id="LoginstatusText_1" class="LoginstatusText" style="background-image:url({$template_path}/images/loginbox/loginbox-font-logout.gif)" ></div><div id="LoginstatusText_2" class="LoginstatusText" style="background-image:url({$template_path}/images/loginbox/loginbox-font-logout-over.gif)" ></div></div>
    </div>
	{else}
	<div id="LoginButtonContainer" style="background-image:url({$template_path}/images/loginbox/loginbox-textfield-background.gif)" >
	<div id="PlayNowContainer" ><form class="MediumButtonForm" action="{$path}/index.php/account/login" method="post" ><input type="hidden" name="page" value="overview" ><div class="MediumButtonBackground" style="background-image:url({$template_path}/images/buttons/mediumbutton.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ><div class="MediumButtonOver" style="background-image:url({$template_path}/images/buttons/mediumbutton-over.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ></div><input class="MediumButtonText" type="image" name="Login" alt="Login" src="{$template_path}/images/buttons/mediumbutton_login.png" /></div></form></div>
    </div>		
    <div class="Loginstatus" style="background-image:url({$template_path}/images/loginbox/loginbox-textfield-background.gif)" >
			<div id="LoginstatusText" onClick="LoginstatusTextAction(this);" onMouseOver="MouseOverLoginBoxText(this);" onMouseOut="MouseOutLoginBoxText(this);" ><div id="LoginstatusText_1" class="LoginstatusText" style="background-image:url({$template_path}/images/loginbox/loginbox-font-create-account.gif)" ></div><div id="LoginstatusText_2" class="LoginstatusText" style="background-image:url({$template_path}/images/loginbox/loginbox-font-create-account-over.gif)" ></div></div>
    </div>
	{/if}


    <div id="BorderRight" class="LoginBorder" style="background-image:url({$template_path}/images/general/chain.gif)" ></div>

    <div id="LoginBottom" class="Loginstatus" style="background-image:url({$template_path}/images/general/box-bottom.gif)" ></div>

  </div>

<div id='Menu'> 
<div id='MenuTop' style='background-image:url({$template_path}/images/general/box-top.gif);'></div> 
<div id='news' class='menuitem'> 
<span onClick="MenuItemAction('news')"> 
  <div class='MenuButton' style='background-image:url({$template_path}/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url({$template_path}/images/menu/button-background-over.gif);'></div> 
      <span id='news_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
      </span> 
      <div id='news_Icon' class='Icon' style='background-image:url({$template_path}/images/menu/icon-news.gif);'></div> 
      <div id='news_Label' class='Label' style='background-image:url({$template_path}/images/menu/label-news.gif);'></div> 
      <div id='news_Extend' class='Extend' style='background-image:url({$template_path}/images/general/plus.gif);'></div> 
    </div> 
  </div> 
</span> 
<div id='news_Submenu' class='Submenu'> 
<a href='{$path}'> 
  <div id='submenu_latestnews' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_latestnews' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_latestnews' class='SubmenuitemLabel'>Latest News</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/home/archive'> 
  <div id='submenu_newsarchive' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_newsarchive' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_newsarchive' class='SubmenuitemLabel'>News Archive</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
</div> 
</div> 
<div id='account' class='menuitem'> 
<span onClick="MenuItemAction('account')"> 
  <div class='MenuButton' style='background-image:url({$template_path}/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url({$template_path}/images/menu/button-background-over.gif);'></div> 
      <span id='account_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
      </span> 
      <div id='account_Icon' class='Icon' style='background-image:url({$template_path}/images/menu/icon-account.gif);'></div> 
      <div id='account_Label' class='Label' style='background-image:url({$template_path}/images/menu/label-account.gif);'></div> 
      <div id='account_Extend' class='Extend' style='background-image:url({$template_path}/images/general/plus.gif);'></div> 
    </div> 
  </div> 
</span> 
<div id='account_Submenu' class='Submenu'> 
<a href='{$path}/index.php/account'> 
  <div id='submenu_accountmanagement' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_accountmanagement' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_accountmanagement' class='SubmenuitemLabel'>Account Management</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/account/create'> 
  <div id='submenu_createaccount' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_createaccount' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_createaccount' class='SubmenuitemLabel'>Create Account</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/account/lost'> 
  <div id='submenu_lostaccount' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_lostaccount' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_lostaccount' class='SubmenuitemLabel'>Lost Account?</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
</div> 
</div> 
<div id='community' class='menuitem'> 
<span onClick="MenuItemAction('community')"> 
  <div class='MenuButton' style='background-image:url({$template_path}/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url({$template_path}/images/menu/button-background-over.gif);'></div> 
      <span id='community_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
      </span> 
      <div id='community_Icon' class='Icon' style='background-image:url({$template_path}/images/menu/icon-community.gif);'></div> 
      <div id='community_Label' class='Label' style='background-image:url({$template_path}/images/menu/label-community.gif);'></div> 
      <div id='community_Extend' class='Extend' style='background-image:url({$template_path}/images/general/plus.gif);'></div> 
    </div> 
  </div> 
</span> 
<div id='community_Submenu' class='Submenu'> 
<a href='{$path}/index.php/character/view'> 
  <div id='submenu_characters' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_characters' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_characters' class='SubmenuitemLabel'>Characters</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/highscores'> 
  <div id='submenu_highscores' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_highscores' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_highscores' class='SubmenuitemLabel'>Highscores</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/deaths'> 
  <div id='submenu_killstatistics' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_killstatistics' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_killstatistics' class='SubmenuitemLabel'>Kill Statistics</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/houses/'> 
  <div id='submenu_houses' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_houses' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_houses' class='SubmenuitemLabel'>Houses</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/guilds'> 
  <div id='submenu_guilds' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_guilds' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_guilds' class='SubmenuitemLabel'>Guilds</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
</div> 
</div> 
<div id='forum' class='menuitem'> 
<span onClick="MenuItemAction('forum')"> 
  <div class='MenuButton' style='background-image:url({$template_path}/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url({$template_path}/images/menu/button-background-over.gif);'></div> 
      <span id='forum_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
      </span> 
      <div id='forum_Icon' class='Icon' style='background-image:url({$template_path}/images/menu/icon-forum.gif);'></div> 
      <div id='forum_Label' class='Label' style='background-image:url({$template_path}/images/menu/label-forum.gif);'></div> 
      <div id='forum_Extend' class='Extend' style='background-image:url({$template_path}/images/general/plus.gif);'></div> 
    </div> 
  </div> 
</span> 
<div id='forum_Submenu' class='Submenu'> 
<a href='{$path}/index.php/forum'> 
  <div id='submenu_worldboards' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_worldboards' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_worldboards' class='SubmenuitemLabel'>Forum</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
</div> 
</div> 
<div id='shops' class='menuitem'> 
<span onClick="MenuItemAction('shops')"> 
  <div class='MenuButton' style='background-image:url({$template_path}/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url({$template_path}/images/menu/button-background-over.gif);'></div> 
      <span id='shops_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url({$template_path}/images/menu/green-light.gif);'></div> 
      </span> 
      <div id='shops_Icon' class='Icon' style='background-image:url({$template_path}/images/menu/icon-shops.gif);'></div> 
      <div id='shops_Label' class='Label' style='background-image:url({$template_path}/images/menu/label-shops.gif);'></div> 
      <div id='shops_Extend' class='Extend' style='background-image:url({$template_path}/images/general/plus.gif);'></div> 
    </div> 
  </div> 
</span> 
<div id='shops_Submenu' class='Submenu'> 
<a href='{$path}/index.php/p/v/gifts/donate'> 
  <div id='submenu_buypoints' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_buypoints' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_buypoints' class='SubmenuitemLabel'><font color=red><blink>Buy Points</blink></font></div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
<a href='{$path}/index.php/p/v/gifts'> 
  <div id='submenu_shopsystem' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_shopsystem' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_shopsystem' class='SubmenuitemLabel'><font color=green>Shop Offer</font></div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a>
{if $logged == 1}
<a href='{$path}/index.php/p/v/gifts/history'> 
  <div id='submenu_history class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
    <div class='LeftChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
    <div id='ActiveSubmenuItemIcon_history' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/menu/icon-activesubmenu.gif);'></div> 
    <div id='ActiveSubmenuItemLabel_history' class='SubmenuitemLabel'>Trans. History</div> 
    <div class='RightChain' style='background-image:url({$template_path}/images/general/chain.gif);'></div> 
  </div> 
</a> 
{/if}
</div> 
</div> 
<div id='MenuBottom' style='background-image:url({$template_path}/images/general/box-bottom.gif);'></div> 
</div> 
<script type='text/javascript'>InitializePage();</script>        </div>

        <div id="ContentColumn">

          <div id="Content" class="Content">

            <div id="ContentHelper">

  <div id="news" class="Box">

    <div class="Corner-tl" style="background-image:url({$template_path}/images/content/corner-tl.gif);"></div>

    <div class="Corner-tr" style="background-image:url({$template_path}/images/content/corner-tr.gif);"></div>

    <div class="Border_1" style="background-image:url({$template_path}/images/content/border-1.gif);"></div>

    <div class="BorderTitleText" style="background-image:url({$template_path}/images/content/title-background-green.gif);"></div>

    <img id="ContentBoxHeadline" class="Title" src="{$template_path}/images/strings/headline-news.gif" alt="Contentbox headline" />

    <div class="Border_2">

      <div class="Border_3">

        <div class="BoxContent" style="background-image:url({$template_path}/images/content/scroll.gif);">
		{$main}
       </div>

      </div>

    </div>

    <div class="Border_1" style="background-image:url({$template_path}/images/content/border-1.gif);"></div>

    <div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url({$template_path}/images/content/corner-bl.gif);"></div></div>

    <div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url({$template_path}/images/content/corner-br.gif);"></div></div>

  </div>

            <div id="ThemeboxesColumn" >

              <div id="DeactivationContainerThemebox" ></div>

              <div id="RightArtwork">

                <img id="Monster" src="{$template_path}/images/header/monsters/gazer.gif" alt="Monster of the Week" />

                <img id="PedestalAndOnline" src="{$template_path}/images/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box"/>
<div id="PlayersOnline" onClick="window.location = '{$path}/index.php/character/online';">
					{foreach from=$worlds key=id item=world}
							{if $serverOnline[$id]}
								<b><font color="#00FF00">{$serverPlayers[$id]}</font>/<font color="#e71515">{$serverMax[$id]}</font></b></div> 
							{else}
								<font color="red"><b>Server<br />OFFLINE</b></font>
							{/if}
					{/foreach}		
               </div>

              </div>

              <div id="Themeboxes">

                

  <div id="PremiumBox" class="Themebox" style="background-image:url({$template_path}/images/themeboxes/premium/premiumbox.gif);">

    <a class="ThemeboxButton" href="{$path}/index.php/p/v/premiumfeatures" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url({$template_path}/images/buttons/sbutton.gif);"><div class="BigButtonOver" style="background-image:url({$template_path}/images/buttons/sbutton_over.gif);"></div>

      <div class="ButtonText" style="background-image:url({$template_path}/images/buttons/_sbutton_getpremium.gif);"></div>

    </a>

    <div class="Bottom" style="background-image:url({$template_path}/images/general/box-bottom.gif);"></div>

  </div>



    <div id="ScreenshotBox" class="Themebox" style="background-image:url({$template_path}/images/themeboxes/screenshot/screenshotbox.gif);">

      <a href="{$path}/index.php/p/v/gallery" >

        <img id="ScreenshotContent" class="ThemeboxContent" src="{$template_path}/images/banshee_thumb.gif" alt="Screenshot of the Day" />

      </a>

    <div class="Bottom" style="background-image:url({$template_path}/images/general/box-bottom.gif);"></div>

    </div>

              </div>

            </div>

          </div>

          </div>
          <div id="Footer">
			 Copyright by CipSoft GmbH. All Rights reserved. Converted by <a href="http://otland.net/members/gpedro/"><b>gpedro</b></a>,<br />
			 Page rendered in: {$renderTime}
          </div>
 

        </div>

      </div>

     </div>

    </div>

  </div>
</body>

</html>
