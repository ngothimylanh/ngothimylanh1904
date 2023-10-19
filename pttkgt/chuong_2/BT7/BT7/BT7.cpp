#include<bits/stdc++.h>
using namespace std;
int n,* arr;
bool NPTT(int* arr)
{
 	for(int j=0;j<n;j++)
	{
  		cout<<arr[j]<<" ";
 	}
 	cout<<endl;
 	int index=n-1;
 	while(arr[index]==1&&index>=0)index--;
 	if(index==-1) return false;
 	arr[index]=1;
 	for(int i=index+1;i<n;i++)
	{
  		arr[i]=0;
 	}
 	return NPTT(arr);
}
int main()
{
	freopen("BT7.inp","r",stdin);
    freopen("BT7.out","w",stdout);
 	cin>> n;
 	arr = new int[n];
 	for(int i=0;i<n;i++)
	{
	    arr[i]=0;
	}
 	NPTT(arr);
 	return 0;
}
