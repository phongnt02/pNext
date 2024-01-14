import React, { useState } from 'react';

function Tab({ tabData }) {
    const [activeTab, setActiveTab] = useState(tabData[0].id);

    const handleTabClick = (tabId) => {
        setActiveTab(tabId);
    };

    return (
        <div className="text-2xl font-medium text-center text-gray-500 dark:text-gray-400 dark:border-gray-700">
            <ul className="flex flex-wrap -mb-px border-b border-gray-200">
                {tabData.map((tab) => (
                    <li key={tab.id} className="me-2">
                        <a
                            onClick={() => handleTabClick(tab.id)}
                            className={`inline-block p-4 border-b-2 rounded-t-lg cursor-pointer ${
                                activeTab === tab.id
                                    ? 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500'
                                    : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'
                            }`}
                        >
                            {tab.label}
                        </a>
                    </li>
                ))}
            </ul>

            <div className="w-full mt-8">
                {tabData.map((tab) => (
                    <div key={tab.id} className={` ${activeTab === tab.id ? 'block' : 'hidden'} `}>
                        {tab.renderContent()}
                    </div>
                ))}
            </div>
        </div>
    );
}

export default Tab;
