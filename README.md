<h2 align="center">XX塾ホームページ</h2>

<h4>1.作成目的</h4>
<p>塾講師時代、手書きで保護者様とやりとりしていて不便だったのを思い出し、今なら直接連絡が取れるサービスを作れると考えた。</p>

<h4>2.使用可能なサービス</h4>
<p>Admin権限</p>
<ul>
	<li>ユーザーの追加</li>
	<li>ユーザー情報の閲覧、権限の変更（Adminがいなくなるのを防ぐため、自分を除く）</li>
	<li>テストの得点入力</li>
	<li>トップページのトピックス欄の編集</li>
	<li>お問い合わせフォームから送られたものの閲覧</li>
	<li>掲示板の閲覧</li>
</ul>

<p>Teacher権限</p>
<ul>
	<li>自分のユーザー情報の閲覧、変更</li>
	<li>テストの得点入力</li>
	<li>掲示板の閲覧</li>
</ul>

<p>User権限</p>
<ul>
	<li>自分のユーザー情報の閲覧、変更</li>
	<li>テストの得点閲覧</li>
	<li>掲示板の閲覧</li>
</ul>

<h4>3.サイトマップ・ER図</h4>
<p>サイトマップ<p>
<img src="https://github.com/shinnichiro/xxschool/blob/main/public/images/siteMap.png">

<p>ER図</p>
<img src="https://github.com/shinnichiro/xxschool/blob/main/public/images/ER.png">

<h4>4.バージョンアップ（スキルアップ）のためのポイント</h4>
<p>a.権限を guard を用いて表現する</p>
<p>今回はusersデータベースにauthカラムを追加した。</p>
<p>作成途中でguardを用いて権限ごとに変えることができるとわかった。</p>
<p>b.見た目の問題</p>
<p>CSSを少々学習したが、ほぼbootstrapに頼ってしまった。</p>
<p>自分が弱い分野だと思うので、学習の余地は多い</p>