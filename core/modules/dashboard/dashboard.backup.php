<?PHP 

$dashboardSection = rand(1,4);

switch($dashboardSection){
	
	case 1:
	$dashboardTemplate = '<p>İçerik yöneticisini kullanarak içerikoluşturabilir, düzenleyebilir ve  alt içerikler ekleyebilirsiniz.</p>
	<p><a href="main.php?module=page/pagelist" class="btn btn-info btn-large">İçerik yöneticisine git &raquo;</a></p>';
	break;
	
	case 2:
	$dashboardTemplate = '<p>Ürün ve kategori yönetimini deneyin. Kategori oluşturabilir düzenleyebilir ve alt kategoriler ekleyebilirsiniz. Oluşturduğunuz kategorilere ürünleri ilişkilendirebilirsiniz.</p>
  <p><a href="main.php?module=product/productlist" class="btn btn-info btn-large">Ürün yöneticisine git &raquo;</a></p>';	
	break;
	
	case 3:
	$dashboardTemplate = '<p>SEO yöneticisini kullanarak arama motoru anahtar kelimelerini ve site açıklamasını düzenleyebilirsiniz.</p>
  <p><a href="main.php?module=settings/seo" class="btn btn-info btn-large">SEO yöneticisine git &raquo;</a></p>';	
	break;
	
	case 4:
	$dashboardTemplate = '<p>Sosyal medya yöneticisini kullanarak sitenize Facebook, Twitter ve Google Plus eklentilerini ekleyebilirsiniz.</p>
  <p><a href="main.php?module=settings/socialmedia" class="btn btn-info btn-large">Sosyal medya yöneticisine git &raquo;</a></p>';	
	break;
	
	default:
	break;
}

?>

<div class="hero-unit">
	<h1>Hoşgeldin, <?PHP print $_SESSION["admin"]["admin_fname"] . " " . $_SESSION["admin"]["admin_lname"]?>!</h1>
    <?PHP print $dashboardTemplate; ?>
</div>