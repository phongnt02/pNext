import { GridLoader } from "react-spinners";

function Loading() {
    return (
        <div className="w-full h-80 flex items-center justify-center">
            <GridLoader
                color="#0C0928"
                loading
                margin={6}
                size={15}
            />
        </div>
    );
}

export default Loading;