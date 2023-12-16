import Home from '../pages/Home';
import Login from '../pages/Login';
import Register from '../pages/Register';
import Courses from '../pages/Courses';
import Learning from '../pages/Learning';
import OnlyHeader from '../layouts/OnlyHeader';

const publicRoutes = [
    {path :'/',component:Home},
    {path :'/login',component:Login,layout:null},
    {path :'/register',component:Register,layout:null},
    {path :'/courses',component:Courses,layout:OnlyHeader},
    {path :'/courses/:courses_id',component:Learning,layout:null},

]

const privateRoutes = []
export { publicRoutes ,privateRoutes }