import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
import '../src/scss/main.scss';
import 'jquery';

UIkit.use(Icons);

function notificar() {
    UIkit.notification("<span uk-icon='icon: check'></span> Message");
}
