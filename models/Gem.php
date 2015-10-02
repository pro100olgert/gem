<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "gems".
 *
 * @property integer $id
 * @property string $name
 * @property string $formula
 * @property integer $color
 * @property integer $traits_color
 * @property string $transparency
 * @property integer $hardness
 * @property integer $shine
 * @property string $cleavage
 * @property string $cleavage_way
 * @property string $structure_type
 * @property string $separate_state
 * @property string $bend
 * @property string $shape
 * @property string $satellites
 * @property string $formation
 * @property string $description
 * @property string $link
 * @property string $image_name
 */
class Gem extends \yii\db\ActiveRecord
{
    const IMAGE_BASE_PATH = "";
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'transparency', 'cleavage', 'cleavage_way', 'color', 'traits_color', 'hardness', 'shine'],
             'required'],
            [['color', 'traits_color', 'hardness', 'shine'], 'integer'],
            [['transparency', 'cleavage', 'cleavage_way', 'separate_state', 'formation', 'description'], 'string'],
            [['name', 'formula', 'structure_type', 'bend', 'shape', 'satellites', 'link', 'image_name'], 'string',
             'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'             => Yii::t('app', 'ID'),
            'name'           => Yii::t('app', 'Name'),
            'formula'        => Yii::t('app', 'Formula'),
            'color'          => Yii::t('app', 'Color'),
            'traits_color'   => Yii::t('app', 'Traits Color'),
            'transparency'   => Yii::t('app', 'Transparency'),
            'hardness'       => Yii::t('app', 'Hardness'),
            'shine'          => Yii::t('app', 'Shine'),
            'cleavage'       => Yii::t('app', 'Cleavage'),
            'cleavage_way'   => Yii::t('app', 'Cleavage Way'),
            'structure_type' => Yii::t('app', 'Structure Type'),
            'separate_state' => Yii::t('app', 'Separate State'),
            'bend'           => Yii::t('app', 'Bend'),
            'shape'          => Yii::t('app', 'Shape'),
            'satellites'     => Yii::t('app', 'Satellites'),
            'formation'      => Yii::t('app', 'Formation'),
            'description'    => Yii::t('app', 'Description'),
            'link'           => Yii::t('app', 'Link'),
            'image_name'     => Yii::t('app', 'Image Name'),
        ];
    }

    public function getTransparencyList()
    {
        return [
            'transparent' => Yii::t('app', 'Transparent'),
            'translucent' => Yii::t('app', 'Translucent'),
            'opaque'      => Yii::t('app', 'Opaque'),
        ];
    }

    public function getCleavageList()
    {
        return [
            'highly_imperfect' => Yii::t('app', 'Highly imperfect'),
            'imperfect '       => Yii::t('app', 'Imperfect'),
            'perfect'          => Yii::t('app', 'Perfect'),
            'highly_perfect'   => Yii::t('app', 'Highly perfect'),
        ];
    }

    public function getSeparateStates()
    {
        return [
            'yes' => Yii::t('app', 'Yes'),
            'no'  => Yii::t('app', 'No'),
        ];
    }

    public function getImagePath()
    {
        return Yii::getAlias('web') . '/images/' . $this->image_name;
    }

    public function getImageUrl()
    {
        return '/images/' . $this->image_name;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param $new
     */
    public function addImage( $uploadedFile, $new )
    {
        if( !empty($uploadedFile) )
        {
            // If file is exist -> remove him
            if( !$new || file_exists($this->getImagePath()) )
            {
                unlink($this->getImagePath());
            }
            $filename = uniqid() . '.' . $uploadedFile->extension;
            $uploadedFile->saveAs($filename);
        }
    }
}
