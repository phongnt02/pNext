import { useParams } from "react-router-dom";
import LearnLayout from "../../layouts/components/LearnLayout";
function Learning() {
    const { id_courses } = useParams();
    
    return (
        <LearnLayout id_courses={id_courses}/>
    );
}

export default Learning;