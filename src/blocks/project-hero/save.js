import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * Save component for Project Hero block.
 *
 * @param {Object} props Block props.
 * @return {JSX.Element} Save component.
 */
export default function Save( { attributes } ) {
    const { title, subtitle, backgroundColor, textColor } = attributes;

    const blockProps = useBlockProps.save( {
        style: {
            backgroundColor,
            color: textColor,
        },
        className: 'project-hero',
    } );

    return (
        <div { ...blockProps }>
            <div className="project-hero__content">
                <RichText.Content
                    tagName="h1"
                    className="project-hero__title"
                    value={ title }
                    style={ { color: textColor } }
                />
                <RichText.Content
                    tagName="p"
                    className="project-hero__subtitle"
                    value={ subtitle }
                    style={ { color: textColor } }
                />
            </div>
        </div>
    );
}
