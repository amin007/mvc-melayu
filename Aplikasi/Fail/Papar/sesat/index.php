<div class="container">
<div class="hero-unit">
<h1>Sesat daa</h1>
<p><?php echo $this->mesej; ?></p>
<pre><?php 
$url = dpt_url_xfilter();
if( isset($url) )
{
	echo '$url=>'; print_r($url);
}	?></pre>
</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->