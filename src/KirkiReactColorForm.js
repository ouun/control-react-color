/* globals _, wp, React */
import { TwitterPicker } from 'react-color';
const KirkiReactColorForm = ( props ) => {
	const handleChangeComplete = ( color ) => {
		wp.customize.control( props.customizerSetting.id ).setting.set( color.hex );
	};

	return (
		<div>
			<label className="customize-control-title">{ props.label }</label>
			<div className="customize-control-notifications-container" ref={ props.setNotificationContainer }></div>
			<TwitterPicker
				color={ props.value }
				onChangeComplete={ handleChangeComplete }
			/>
		</div>
	);
};

export default KirkiReactColorForm;
