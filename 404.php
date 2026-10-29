<?php
get_header();
?>

<!-- Content -->
<div class="container context-dark">
    <div class="row">
        <div class="col-md-10 col-xl-8">
            <h2 class="page-title-text">404</h2>
        </div>
    </div>
</div>
</section>

<!-- 404 -->
<section class="section-md bg-transparent">
    <div class="container">
        <div class="row row-30 row-lg-5 row-gutters-5">
            <div class="col-sm-6 col-lg-8 no_page">
                <h2>Такой страницы не существует</h2>
                <p class="big">Извините, но страницу, которую вы искали, не удалось найти. Возможно, она была переименована или удалена.</p>
            </div>
            <div class="col-sm-11">
                <div class="rd-serch-container bg-primary-lighten">
                    <div class="d-flex align-items-center group-20 flex-wrap justify-content-center">
                        <div class="rd-serch-container-item"><a href="<?php echo esc_url(home_url('/')); ?>">Перейти на главную</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


