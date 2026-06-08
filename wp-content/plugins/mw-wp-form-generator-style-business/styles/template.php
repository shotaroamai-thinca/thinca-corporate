<?php
/**
 * MW_WP_Form_Generator_Template_Business
 * Version    : 1.1.0
 * Author     : Takashi Kitajima
 * Created    : November 6, 2014
 * Modified   : November 17, 2015
 * License    : GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
class MW_WP_Form_Generator_Template_Business extends MW_WP_Form_Generator_Template_Base {

	/**
	 * create_content
	 * @param string $content 本文
	 * @param array $items フォーム項目
	 * @param array $other_items エラー要素などの非フォーム項目
	 * @return string $content
	 */
	public function create_content( $content, $items, $other_items ) {
		$content = '<table>';
		foreach ( $items as $item ) {
			$require = '';
			if ( $item['require'] === true ) {
				$require = sprintf(
					'<span class="require">%s</span>',
					esc_html__( 'REQUIRE', 'mw-wp-form-generator-style-business' )
				);
			}

			$description = '';
			if ( !empty( $item['description'] ) ) {
				$description = sprintf(
					'<div class="business-description">%s</div>',
					wpautop( $item['description'] )
				);
			}

			$notes = '';
			if ( $item['notes'] ) {
				$notes = sprintf( '<span class="notes">%s</span>', esc_attr( $item['notes'] ) );
			}
			$content .= sprintf(
				'<tr>
					<th>%s%s</th>
					<td>
						%s
						%s
						%s
					</td>
				</tr>',
				$item['display_name'],
				$require,
				$description,
				$item['shortcode'],
				$notes
			);
		}
		$content .= '</table>';
		$content .= implode( '', $other_items );
		$content .= '<div class="action-buttons">[mwform_backButton] [mwform_submitButton]</div>';
		return $content;
	}
}
new MW_WP_Form_Generator_Template_Business();
