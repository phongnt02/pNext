import Home from '../pages/Home';
import Login from '../pages/Login';
import Register from '../pages/Register';
import Courses from '../pages/Courses';
import Learning from '../pages/Learning'
import DocumentLibrary from '../pages/DocumentLibrary';
import Entertainment from '../pages/Entertainment';
import Community from '../pages/Community';

const publicRoutes = [
    {path :'/',component:Home},
    {path :'/login',component:Login,layout:null},
    {path :'/register',component:Register,layout:null},
    {path :'/courses',component:Courses},
    {path :'/courses/:courses_id',component:Learning,layout:null},
    {path :'/documentlibrary',component:DocumentLibrary},
    {path :'/community',component:Community},
    {path :'/entertainment',component:Entertainment},

]

const privateRoutes = []
export { publicRoutes ,privateRoutes }