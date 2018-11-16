    <div class="trip-search">
        <div class="container">
            <form method="POST" action="<?php echo esc_url(home_url('/'));?>" class="search">
              <!-- Form Destination -->
              <div class="form-group">
                <input type="text" class="form-control" placeholder="<?php esc_attr_e('Search','travel-company');?> ..." value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
            </div>
            <!-- Form Button -->
            <div class="form-group button">
                <button type="submit" class="btn"><?php echo esc_html__('Search','travel-company');?></button>
            </div>
            <!--/ End Form Button -->
        </form>
    </div>
</div>