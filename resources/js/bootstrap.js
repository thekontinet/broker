import axios from 'axios';
import 'preline'
import Clipboard from "clipboard"

window.axios = axios;
window.Clipboard = Clipboard;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
