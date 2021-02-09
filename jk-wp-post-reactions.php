<?php defined('ABSPATH') || exit;

class jk_wp_post_reactions
{

    public static function the_post_reactions($post_id, $user_id)
    {

        $is_user_logged_in = is_user_logged_in();

        $classes = array();

        $active = false;

        $post_reactions = get_post_meta($post_id, 'post_reactions_' . $post_id);

        if ($is_user_logged_in):

            $user_react = get_option('reaction_user_' . $user_id);

            if (!empty($user_react[$post_id])):

                $active = (int)$user_react[$post_id];

            endif;

        else:

            array_push($classes, 'login-modal-trigger');

            array_push($classes, 'not-authorize');

        endif;

        ?>

        <div class="post-reactions <?php echo esc_attr(implode(' ', $classes)); ?>">

            <div class="inner-wrapper">

                <div class="reactions-tab">

                    <div class="react-button-wrapper">

                        <button class="react-button react-button-terribly <?php if ($active === 1): ?> active-button <?php endif; ?>"
                                data-type="<?php echo esc_attr(1); ?>">

                        <span class="react-wrapper">

                            🤢

                        </span>

                            <span class="react-title">

                            <?php echo esc_html('Terribly'); ?>

                        </span>

                            <span class="react-count">

                                <?php if (!empty($post_reactions[0]['terribly'])): ?>

                                    <?php echo esc_html($post_reactions[0]['terribly']); ?>

                                <?php else: ?>

                                    <?php echo esc_html('0'); ?>

                                <?php endif; ?>

                        </span>

                        </button>

                    </div>

                    <div class="react-button-wrapper">

                        <button class="react-button react-button-badly <?php if ($active === 2): ?> active-button <?php endif; ?>"
                                data-type="<?php echo esc_attr(2); ?>">

                        <span class="react-wrapper">

                            😕

                        </span>

                            <span class="react-title">

                        <?php echo esc_html('Badly'); ?>

                        </span>

                            <span class="react-count">

                                      <?php if (!empty($post_reactions[0]['badly'])): ?>

                                          <?php echo esc_html($post_reactions[0]['badly']); ?>

                                      <?php else: ?>

                                          <?php echo esc_html('0'); ?>

                                      <?php endif; ?>

                        </span>

                        </button>

                    </div>

                    <div class="react-button-wrapper">

                        <button class="react-button react-button-good <?php if ($active === 3): ?> active-button <?php endif; ?>"
                                data-type="<?php echo esc_attr(3); ?>">

                        <span class="react-wrapper">

                            😄

                        </span>

                            <span class="react-title">

                        <?php echo esc_html('Good'); ?>

                        </span>

                            <span class="react-count">

                                      <?php if (!empty($post_reactions[0]['good'])): ?>

                                          <?php echo esc_html($post_reactions[0]['good']); ?>

                                      <?php else: ?>

                                          <?php echo esc_html('0'); ?>

                                      <?php endif; ?>

                        </span>

                        </button>

                    </div>

                    <div class="react-button-wrapper">

                        <button class="react-button react-button-cool <?php if ($active === 4): ?> active-button <?php endif; ?>"
                                data-type="<?php echo esc_attr(4); ?>">

                        <span class="react-wrapper">

                            😁

                        </span>

                            <span class="react-title">

                        <?php echo esc_html('Сool'); ?>

                        </span>

                            <span class="react-count">

                                      <?php if (!empty($post_reactions[0]['cool'])): ?>

                                          <?php echo esc_html($post_reactions[0]['cool']); ?>

                                      <?php else: ?>

                                          <?php echo esc_html('0'); ?>

                                      <?php endif; ?>

                        </span>

                        </button>

                    </div>

                    <div class="react-button-wrapper">

                        <button class="react-button react-button-excellent <?php if ($active === 5): ?> active-button <?php endif; ?>"
                                data-type="<?php echo esc_attr(5); ?>">

                        <span class="react-wrapper">

                            🤩

                        </span>

                            <span class="react-title">

                        <?php echo esc_html('Excellent'); ?>

                        </span>

                            <span class="react-count">

                                      <?php if (!empty($post_reactions[0]['excellent'])): ?>

                                          <?php echo esc_html($post_reactions[0]['excellent']); ?>

                                      <?php else: ?>

                                          <?php echo esc_html('0'); ?>

                                      <?php endif; ?>

                        </span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <?php
    }

}
