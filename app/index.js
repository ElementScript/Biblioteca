import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
import '../src/scss/main.scss';
import 'jquery';

UIkit.use(Icons);

function reservado() {
    UIkit.notification({message: '<span uk-icon=\'icon: check\'></span>Reservado com sucesso!'}, 'success');
}

module.export = reservado;
