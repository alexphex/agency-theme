import { __ } from '@wordpress/i18n';
import {
    useBlockProps,
    InspectorControls,
    RichText,
} from '@wordpress/block-editor';
import {
    PanelBody,
    ColorPicker,
} from '@wordpress/components';

/**
 * Edit component for Project Hero block.
 *
 * @param {Object} props Block props.
 * @return {JSX.Element} Edit component.
 */
export default function Edit( { attributes, setAttributes } ) {
    const { title, subtitle, backgroundColor, textColor } = attributes;

    const blockProps = useBlockProps( {
        style: {
            backgroundColor,
            color: textColor,
        },
        className: 'project-hero',
    } );

    return (
        <>
            <InspectorControls>
                <PanelBody
                    title={ __( 'Background Color', 'agency-theme' ) }
                    initialOpen={ true }
                >
                    <ColorPicker
                        color={ backgroundColor }
                        onChange={ ( value ) =>
                            setAttributes( { backgroundColor: value } )
                        }
                        enableAlpha={ false }
                    />
                </PanelBody>

                <PanelBody
                    title={ __( 'Text Color', 'agency-theme' ) }
                    initialOpen={ false }
                >
                    <ColorPicker
                        color={ textColor }
                        onChange={ ( value ) =>
                            setAttributes( { textColor: value } )
                        }
                        enableAlpha={ false }
                    />
                </PanelBody>
            </InspectorControls>

            <div { ...blockProps }>
                <div className="project-hero__content">
                    <RichText
                        tagName="h1"
                        className="project-hero__title"
                        value={ title }
                        onChange={ ( value ) =>
                            setAttributes( { title: value } )
                        }
                        placeholder={ __( 'Project Title', 'agency-theme' ) }
                        style={ { color: textColor } }
                    />
                    <RichText
                        tagName="p"
                        className="project-hero__subtitle"
                        value={ subtitle }
                        onChange={ ( value ) =>
                            setAttributes( { subtitle: value } )
                        }
                        placeholder={ __( 'Project subtitle...', 'agency-theme' ) }
                        style={ { color: textColor } }
                    />
                </div>
            </div>
        </>
    );
}
