<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla CMS.
 * Provides a modal media selector including upload mechanism
 *
 * @package     Joomla.Libraries
 * @subpackage  Form
 * @since       1.6
 */
class JFormFieldUsermedia extends JFormField
{
  /**
   * The form field type.
   *
   * @var    string
   * @since  1.6
   */
  protected $type = 'usermedia';

  /**
   * The initialised state of the document object.
   *
   * @var    boolean
   * @since  1.6
   */
  protected static $initialised = false;

  /**
   * The authorField.
   *
   * @var    string
   * @since  3.2
   */
  protected $authorField;

  /**
   * The asset.
   *
   * @var    string
   * @since  3.2
   */
  protected $asset;

  /**
   * The link.
   *
   * @var    string
   * @since  3.2
   */
  protected $link;

  /**
   * The authorField.
   *
   * @var    string
   * @since  3.2
   */
  protected $preview;

  /**
   * The preview.
   *
   * @var    string
   * @since  3.2
   */
  protected $directory;

  /**
   * The previewWidth.
   *
   * @var    int
   * @since  3.2
   */
  protected $previewWidth;

  /**
   * The previewHeight.
   *
   * @var    int
   * @since  3.2
   */
  protected $previewHeight;

  /**
   * Method to get certain otherwise inaccessible properties from the form field object.
   *
   * @param   string  $name  The property name for which to the the value.
   *
   * @return  mixed  The property value or null.
   *
   * @since   3.2
   */
  public function __get($name)
  {
    switch ($name)
    {
      case 'authorField':
      case 'asset':
      case 'link':
      case 'preview':
      case 'directory':
      case 'previewWidth':
      case 'previewHeight':
        return $this->$name;
    }

    return parent::__get($name);
  }

  /**
   * Method to set certain otherwise inaccessible properties of the form field object.
   *
   * @param   string  $name   The property name for which to the the value.
   * @param   mixed   $value  The value of the property.
   *
   * @return  void
   *
   * @since   3.2
   */
  public function __set($name, $value)
  {
    switch ($name)
    {
      case 'authorField':
      case 'asset':
      case 'link':
      case 'preview':
      case 'directory':
        $this->$name = (string) $value;
        break;

      case 'previewWidth':
      case 'previewHeight':
        $this->$name = (int) $value;
        break;

      default:
        parent::__set($name, $value);
    }
  }

  /**
   * Method to get the field input markup for a media selector.
   * Use attributes to identify specific created_by and asset_id fields
   *
   * @return  string  The field input markup.
   *
   * @since   1.6
   */
  protected function getInput()
  {
  //   $asset = $this->asset;

  //   if ($asset == '')
  //   {
  //     $asset = JFactory::getApplication()->input->get('option');
  //   }

  //   if (!self::$initialised)
  //   {
  //     // Load the modal behavior script.
  //     JHtml::_('behavior.modal');

  //     // Build the script.
  //     $script = array();
  //     $script[] = ' function jInsertFieldValue(value, id) {';
  //     $script[] = '   var old_value = document.id(id).value;';
  //     $script[] = '   if (old_value != value) {';
  //     $script[] = '     var elem = document.id(id);';
  //     $script[] = '     elem.value = value;';
  //     $script[] = '     elem.fireEvent("change");';
  //     $script[] = '     if (typeof(elem.onchange) === "function") {';
  //     $script[] = '       elem.onchange();';
  //     $script[] = '     }';
  //     $script[] = '     jMediaRefreshPreview(id);';
  //     $script[] = '   }';
  //     $script[] = ' }';

  //     $script[] = ' function jMediaRefreshPreview(id) {';
  //     $script[] = '   var value = document.id(id).value;';
  //     $script[] = '   var img = document.id(id + "_preview");';
  //     $script[] = '   if (img) {';
  //     $script[] = '     if (value) {';
  //     $script[] = '       img.src = "' . JUri::root() . '" + value;';
  //     $script[] = '       document.id(id + "_preview_empty").setStyle("display", "none");';
  //     $script[] = '       document.id(id + "_preview_img").setStyle("display", "");';
  //     $script[] = '     } else { ';
  //     $script[] = '       img.src = ""';
  //     $script[] = '       document.id(id + "_preview_empty").setStyle("display", "");';
  //     $script[] = '       document.id(id + "_preview_img").setStyle("display", "none");';
  //     $script[] = '     } ';
  //     $script[] = '   } ';
  //     $script[] = ' }';

  //     $script[] = ' function jMediaRefreshPreviewTip(tip)';
  //     $script[] = ' {';
  //     $script[] = '   var img = tip.getElement("img.media-preview");';
  //     $script[] = '   tip.getElement("div.tip").setStyle("max-width", "none");';
  //     $script[] = '   var id = img.getProperty("id");';
  //     $script[] = '   id = id.substring(0, id.length - "_preview".length);';
  //     $script[] = '   jMediaRefreshPreview(id);';
  //     $script[] = '   tip.setStyle("display", "block");';
  //     $script[] = ' }';

  //     // Add the script to the document head.
  //     JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

  //     self::$initialised = true;
  //   }

  //   $html = array();
  //   $attr = '';

  //   // Initialize some field attributes.
  //   $attr .= !empty($this->class) ? ' class="input-small ' . $this->class . '"' : ' class="input-small"';
  //   $attr .= !empty($this->size) ? ' size="' . $this->size . '"' : '';

  //   // Initialize JavaScript field attributes.
  //   $attr .= !empty($this->onchange) ? ' onchange="' . $this->onchange . '"' : '';

  //   // The text field.
  //   $html[] = '<div class="input-prepend input-append">';

  //   // The Preview.
  //   $showPreview = true;
  //   $showAsTooltip = false;

  //   switch ($this->preview)
  //   {
  //     case 'no': // Deprecated parameter value
  //     case 'false':
  //     case 'none':
  //       $showPreview = false;
  //       break;

  //     case 'yes': // Deprecated parameter value
  //     case 'true':
  //     case 'show':
  //       break;

  //     case 'tooltip':
  //     default:
  //       $showAsTooltip = true;
  //       $options = array(
  //         'onShow' => 'jMediaRefreshPreviewTip',
  //       );
  //       JHtml::_('behavior.tooltip', '.hasTipPreview', $options);
  //       break;
  //   }

  //   if ($showPreview)
  //   {
  //     if ($this->value && file_exists(JPATH_ROOT . '/' . $this->value))
  //     {
  //       $src = JUri::root() . $this->value;
  //     }
  //     else
  //     {
  //       $src = '';
  //     }

  //     $width = $this->previewWidth;
  //     $height = $this->previewHeight;
  //     $style = '';
  //     $style .= ($width > 0) ? 'max-width:' . $width . 'px;' : '';
  //     $style .= ($height > 0) ? 'max-height:' . $height . 'px;' : '';

  //     $imgattr = array(
  //       'id' => $this->id . '_preview',
  //       'class' => 'media-preview',
  //       'style' => $style,
  //     );

  //     $img = JHtml::image($src, JText::_('JLIB_FORM_MEDIA_PREVIEW_ALT'), $imgattr);
  //     $previewImg = '<div id="' . $this->id . '_preview_img"' . ($src ? '' : ' style="display:none"') . '>' . $img . '</div>';
  //     $previewImgEmpty = '<div id="' . $this->id . '_preview_empty"' . ($src ? ' style="display:none"' : '') . '>'
  //       . JText::_('JLIB_FORM_MEDIA_PREVIEW_EMPTY') . '</div>';

  //     if ($showAsTooltip)
  //     {

  //       $tooltip = $previewImgEmpty . $previewImg;
  //       $options = array(
  //         'title' => JText::_('JLIB_FORM_MEDIA_PREVIEW_SELECTED_IMAGE'),
  //         'text' => '<i class="icon-eye"></i>',
  //         'class' => 'hasTipPreview'
  //       );

  //       $html[] = JHtml::tooltip($tooltip, $options);
  //       $html[] = '</div>';
  //     }
  //     else
  //     {
  //       $html[] = '<div class="media-preview add-on" style="height:auto">';
  //       $html[] = ' ' . $previewImgEmpty;
  //       $html[] = ' ' . $previewImg;
  //       $html[] = '</div>';
  //     }
  //   }

  //   $html[] = ' <input type="text" name="' . $this->name . '" id="' . $this->id . '" value="'
  //     . htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '" readonly="readonly"' . $attr . ' />';

  //   if ($this->value && file_exists(JPATH_ROOT . '/' . $this->value))
  //   {
  //     $folder = explode('/', $this->value);
  //     $folder = array_diff_assoc($folder, explode('/', JComponentHelper::getParams('com_media')->get('image_path', 'images')));
  //     array_pop($folder);
  //     $folder = implode('/', $folder);
  //   }
  //   elseif (file_exists(JPATH_ROOT . '/' . JComponentHelper::getParams('com_media')->get('image_path', 'images') . '/' . $this->directory))
  //   {
  //     $folder = $this->directory;
  //   }
  //   else
  //   {
  //     $folder = '';
  //   }

  //   // The button.
  //   if ($this->disabled != true)
  //   {
  //     JHtml::_('bootstrap.tooltip');

  //     $html[] = '<a class="modal btn" title="' . JText::_('JLIB_FORM_BUTTON_SELECT') . '" href="'
  //       . ($this->readonly ? ''
  //       : ($this->link ? $this->link
  //         : 'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=' . $asset . '&amp;author='
  //         . $this->form->getValue($this->authorField)) . '&amp;fieldid=' . $this->id . '&amp;folder=' . $folder) . '"'
  //       . ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
  //     $html[] = JText::_('JLIB_FORM_BUTTON_SELECT') . '</a><a class="btn hasTooltip" title="' . JText::_('JLIB_FORM_BUTTON_CLEAR') . '" href="#" onclick="';
  //     $html[] = 'jInsertFieldValue(\'\', \'' . $this->id . '\');';
  //     $html[] = 'return false;';
  //     $html[] = '">';
  //     $html[] = '<i class="icon-remove"></i></a>';
  //   }
  ?>
<input type="file" name="file" id="file">
<?php


  return implode("\n", $html);
  // }
}
